<?php

namespace App\Http\Controllers\Api\representative;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\RepresentativeResource;
use App\Notifications\OrderCancelNotification;
use App\Notifications\OrderDeliveryNotification;
use App\Notifications\OrderDoneNotification;
use App\Notifications\OrderNewNotification;
use App\Notifications\PublicNotification;
use App\Order;
use App\Representative;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class V1APIController extends Controller
{
    public function return_errors($validator)
    {
        $errors = $validator->errors();
        $error_data = [];
        foreach ($errors->all() as $error) {
            array_push($error_data, $error);
        }
        $data = $error_data;
        return response()->json([
            'status' => false,
            'errors' => $data
        ]);
    }

    /* profile operations */
    public function EditRepresentative(Request $request)
    {
        $representative = Representative::selectRaw('id, name, mobile, email, user_name')
            ->where('api_token', $request->api_token)->first();

        return response()->json([
            'status' => true,
            'data' => new RepresentativeResource($representative)
        ]);
    }
    public function UpdateRepresentative(Request $request)
    {
        $representative = auth()->guard('IsRepresentative')->user();

        $messages = [
            'name.unique' => 'هذا الاسم مستخدم من قبل',
            'mobile.unique' => 'هذا الجوال مستعمل من قبل',
            'email.unique' => 'هذا البريد الالكترونى مستعمل من قبل',
            'user_name.unique' => 'اسم المستخدم مستخدم من قبل',
        ];
        $rules = [
            'mobile' => 'required|ksa_phone|unique:representatives,mobile,' . $representative->id,
            'name' => 'required|max:120|unique:representatives,name,' . $representative->id,
            'email' => 'required|email|unique:representatives,email,' . $representative->id,
            'user_name' => 'required|unique:representatives,user_name,' . $representative->id,
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        } else {
            $representative->update($request->all());

            $msg = 'تم تعديل بياناتك بنجاح';

            return response()->json([
                'status' => true,
                'message' => $msg
            ]);
        }
    }
    public function RepUpdatePassword(Request $request)
    {
        $representative = auth()->guard('IsRepresentative')->user();

        $rules = [
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        } else {
            $user_pass = $representative->password;
            $typed = $request->current_password;

            if (Hash::check($typed, $user_pass)) {
                $representative->password = Hash::make($request->new_password);
                $representative->save();

                return response()->json([
                    'status' => true,
                    'message' => 'تم تغيير كلمة المرور بنجاح'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'كلمة المرور الحالية غير صحيحة'
                ]);
            }
        }
    }

    /* notifications */
    public function RepGetNotifications()
    {
        $notifications = auth()->guard('IsRepresentative')->user()->notifications;

        if ($notifications->count() > 0) {
            return response()->json([
                'status' => true,
                'data' => NotificationResource::collection($notifications)
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'لا توجد اشعارات حتى الأن'
        ]);
    }
    public function RepReadNotification($id)
    {
        $representative = auth()->guard('IsRepresentative')->user();

        $notification = $representative->notifications->where('id', $id)->first();
        if($notification){
            $notification->markAsRead();
            return response()->json([
                'status' => true,
                'message' => 'تمت قراءة الاشعار بنجاح'
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'لا يوجد اشعار بهذه البيانات'
        ]);
    }

    /* current orders */
    public function RepGetCurrentOrders(Request $request)
    {
        $representative = auth()->guard('IsRepresentative')->user();

        $current_orders = Order::selectRaw('id,payment_way,net,name,mobile,location,day,time,client_date')
            ->where('representative_id', $representative->id)->where('status', 'process');
        if($request->filled('date_search')){
            $current_orders->whereDate('client_date', $request->date_search);
        }
        $current_orders = $current_orders->get();

        if ($current_orders->count() > 0) {
            return response()->json([
                'status' => true,
                'data' => OrderResource::collection($current_orders)
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'لا يوجد طلبات حتى الأن'
        ]);
    }

    /* done orders */
    public function RepGetDoneOrders(Request $request)
    {
        $representative = auth()->guard('IsRepresentative')->user();

        $done_orders = Order::selectRaw('id,payment_way,net,name,mobile,location,day,time,client_date')
            ->where('representative_id', $representative->id)->where('status', 'done');
        if($request->filled('date_search')){
            $done_orders->whereDate('client_date', $request->date_search);
        }
        $done_orders = $done_orders->get();

        if ($done_orders->count() > 0) {
            return response()->json([
                'status' => true,
                'data' => OrderResource::collection($done_orders)
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'لا يوجد طلبات حتى الأن'
        ]);
    }

    /* order details */
    public function RepGetOrderDetails($id)
    {
        $representative = auth()->guard('IsRepresentative')->user();

        $order = Order::selectRaw('id,payment_way,net,name,mobile,location,lat,lon,day,time,client_date,total,add_value,net')
            ->where('representative_id', $representative->id)
            ->where('id', $id)
            ->with('OrderProducts')->first();

        if ($order) {
            return response()->json([
                'status' => true,
                'data' => new OrderResource($order)
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'لا يوجد طلب بهذه البيانات'
        ]);
    }

    /* cancel order */
    public function RepCancelOrder(Request $request)
    {
        $representative = auth()->guard('IsRepresentative')->user();

        $rules = [
            'order_id' => 'required|numeric|exists:orders,id',
            'cancel_reason' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        } else {
            $order = Order::where('representative_id', $representative->id)
                ->where('id', $request->order_id)
                ->where('status', 'process')->first();

            if ($order) {
                $order->update([
                    'who_cancel' => 'representative',
                    'cancel_reason' => $request->cancel_reason,
                    'status' => 'cancel'
                ]);

                ## notification
                $notify_msg = 'تم الغاء الطلب #'.$order->id;
                $order->Company->notify(new OrderCancelNotification($order->id, $notify_msg));
                $order->Client->notify(new OrderCancelNotification($order->id, $notify_msg));
                if($order->Client->player_id and !in_array($order->Client->player_id, ['', null])){
                    $tokens = [$order->Client->player_id];
                    $data = ['type' => 'order', 'order_id' => $order->id];
                    sendNoteClient($tokens, $notify_msg, $data);
                }

                return response()->json([
                    'status' => true,
                    'message' => 'تم الغاء الطلب بنجاح'
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'لا يوجد طلب بهذه البيانات'
            ]);
        }
    }

    /* deliver order */
    public function RepDeliverOrder(Request $request)
    {
        $representative = auth()->guard('IsRepresentative')->user();

        $rules = [
            'order_id' => 'required|numeric|exists:orders,id'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        } else {
            $order = Order::where('representative_id', $representative->id)
                ->where('id', $request->order_id)
                ->where('status', 'process')->first();

            if ($order) {
                $order->update([
                    'status' => 'done',
                    'done_date' => date('Y-m-d', strtotime(Carbon::now())),
                    'done_day' => date('l', strtotime(Carbon::now())),
                    'done_time' => date('H:i', strtotime(Carbon::now())),
                ]);

                ## notification
                $notify_msg1 = 'تم استلام المبلغ وتسليم الطلب #'.$order->id;
                $order->Company->notify(new OrderDeliveryNotification($order->id, $notify_msg1));
                $notify_msg2 = 'تم الانتهاء من استلام الطلب #'.$order->id;
                $order->Client->notify(new OrderDeliveryNotification($order->id, $notify_msg2));
                if($order->Client->player_id and !in_array($order->Client->player_id, ['', null])){
                    $tokens = [$order->Client->player_id];
                    $data = ['type' => 'order', 'order_id' => $order->id];
                    sendNoteClient($tokens, $notify_msg2, $data);
                }

                return response()->json([
                    'status' => true,
                    'message' => 'تم استلام المبلغ وتسليم الطلب'
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'لا يوجد طلب بهذه البيانات'
            ]);
        }
    }
}
