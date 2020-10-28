<?php

namespace App\Http\Controllers\Api\client;

use App\City;
use App\CityCompany;
use App\Client;
use App\ClientLocation;
use App\Company;
use App\CompanyDate;
use App\ContactUs;
use App\Coupon;
use App\FixedPage;
use App\Http\Resources\CityCompaniesResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\ClientLocationResource;
use App\Http\Resources\ClientResource;
use App\Http\Resources\CompanyDateResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\FixedPageResource;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SettingResource;
use App\Notifications\OrderCancelNotification;
use App\Notifications\OrderDoneNotification;
use App\Notifications\OrderNewNotification;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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

    /* fixed pages */
    public function FixedPages()
    {
        $pages = FixedPage::get();
        if ($pages->count() > 0) {
            return response()->json([
                'status' => true,
                'data' => FixedPageResource::collection($pages)
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'ليس لديك صفحات ثابتة حتى الأن'
            ]);
        }
    }
    public function FixedPageDetails($id)
    {
        $page = FixedPage::where('id', $id)->first();
        if ($page) {
            return response()->json([
                'status' => true,
                'data' => new FixedPageResource($page)
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'لا توجد صفحة ثابتة بهذه البيانات'
            ]);
        }

    }

    /* profile operations */
    public function EditClient(Request $request)
    {
        $client = Client::selectRaw('id, name, mobile, email, location, lat, lon')
            ->where('api_token', $request->api_token)->first();

        return response()->json([
            'status' => true,
            'data' => new ClientResource($client)
        ]);
    }
    public function UpdateClient(Request $request)
    {
        $client = Client::selectRaw('id, name, mobile, email, location, lat, lon')
            ->where('api_token', $request->api_token)->first();

        $messages = [
            'name.unique' => 'هذا الاسم مستخدم من قبل',
            'mobile.unique' => 'هذا الجوال مستعمل من قبل',
            'email.unique' => 'هذا البريد الالكترونى مستعمل من قبل',
        ];
        $rules = [
            'mobile' => 'required|ksa_phone|unique:clients,mobile,' . $client->id,
            'name' => 'required|max:120|unique:clients,name,' . $client->id,
            'email' => 'required|email|unique:clients,email,' . $client->id,
        ];
        if ($request->filled('location')) {
            $rules['location'] = 'required';
            $rules['lat'] = 'required';
            $rules['lon'] = 'required';
        }
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        } else {
            $client->update($request->all());

            $msg = 'تم تعديل بياناتك بنجاح';

            return response()->json([
                'status' => true,
                'message' => $msg
            ]);
        }
    }
    public function UpdatePassword(Request $request)
    {
        $client = Client::selectRaw('id, password')
            ->where('api_token', $request->api_token)->first();

        $rules = [
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        } else {
            $user_pass = $client->password;
            $typed = $request->current_password;

            if (Hash::check($typed, $user_pass)) {
                $client->password = Hash::make($request->new_password);
                $client->save();

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

    /* previous locations*/
    public function ShowLocations(Request $request)
    {
        $client = Client::select('id')->where('api_token', $request->api_token)->first();
        $locations = ClientLocation::where('client_id', $client->id)->get();

        if ($locations->count() > 0) {
            return response()->json([
                'status' => true,
                'data' => ClientLocationResource::collection($locations)
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'لا يوجد بيانات حتى الأن'
            ]);
        }
    }
    public function AddLocation(Request $request)
    {
        $client = Client::select('id')->where('api_token', $request->api_token)->first();

        $rules = [
            'locations' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        } else {
            foreach ($request->locations as $location) {
                $data = [
                    'client_id' => $client->id,
                    'location' => $location['location'],
                    'lat' => $location['lat'],
                    'lon' => $location['lon']
                ];
                ClientLocation::create($data);
            }
            return response()->json([
                'status' => true,
                'message' => 'تم اضافة المواقع بنجاح'
            ]);
        }
    }
    public function RemoveLocation($id, Request $request)
    {
        $client = Client::select('id')->where('api_token', $request->api_token)->first();

        $location = ClientLocation::where(['id' => $id, 'client_id' => $client->id])->first();
        if ($location) {
            $location->delete();
            return response()->json([
                'status' => true,
                'message' => 'تم حذف الموقع بنجاح'
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'لا يوجد موقع بهذه البيانات'
        ]);
    }

    /* company & products */
    public function GetCompanies()
    {
        $companies = Company::selectRaw('id,name,image,minimum_orders')
            ->where(['admin_agree' => 'agree', 'active' => 'active'])
            ->with('CompanyDates')->whereHas('CompanyDates')->get();

        if ($companies->count() > 0) {
            return response()->json([
                'status' => true,
                'data' => CompanyResource::collection($companies)
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'لا توجد بيانات حتى الأن'
        ]);
    }
    public function GetProducts($company_id, $kind)
    {
        $products = Product::selectRaw('id,name,image,size,normal,normal_price,kind')
            ->where(['company_id' => $company_id, 'normal' => 1, 'hide' => 'not_hide']);
            if($kind == 'both'){
                $products = $products->where(function ($q){
                    $q->where('kind', 'carton')->orWhere('kind', 'galon');
                });
            }else{
                $products = $products->where('kind', $kind);
            }
        $products = $products->get();

        if ($products->count() > 0) {
            return response()->json([
                'status' => true,
                'data' => ProductResource::collection($products)
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'لا توجد بيانات حتى الأن'
        ]);
    }
    public function GetMosqueProducts($company_id)
    {
        $products = Product::selectRaw('id,name,image,size,normal_price,mosque,mosque_price,kind')
            ->where(['company_id' => $company_id, 'mosque' => 1, 'hide' => 'not_hide'])
            ->get();

        if ($products->count() > 0) {
            return response()->json([
                'status' => true,
                'data' => ProductResource::collection($products)
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'لا توجد بيانات حتى الأن'
        ]);
    }
    public function GetOfferProducts($company_id)
    {
        $products = Product::selectRaw('id,name,image,size,normal_price,offer,offer_price,kind')
            ->where(['company_id' => $company_id, 'offer' => 1, 'hide' => 'not_hide'])
            ->get();

        if ($products->count() > 0) {
            return response()->json([
                'status' => true,
                'data' => ProductResource::collection($products)
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'لا توجد بيانات حتى الأن'
        ]);
    }

    /* contact us */
    public function SiteInfo()
    {
        $info = Setting::select('name', 'email', 'mobile', 'address', 'fax', 'facebook', 'twitter', 'instagram', 'whatsapp', 'commission_percentage', 'add_value')
            ->first();

        return response()->json([
            'status' => true,
            'data' => new SettingResource($info)
        ]);
    }
    public function ContactUsInfo()
    {
        $info = Setting::select('email', 'mobile', 'address', 'fax', 'facebook', 'twitter', 'instagram', 'whatsapp')
            ->first();

        return response()->json([
            'status' => true,
            'data' => new SettingResource($info)
        ]);
    }
    public function ContactUs(Request $request)
    {
        $rules = [
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'title' => 'required',
            'body' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        } else {
            $contact = ContactUs::create($request->all());
            if ($contact) {
                return response()->json([
                    'status' => true,
                    'message' => 'تم ارسال الرساله بنجاح',
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'خطأ اثناء الارسال برجاء المحاوله مره اخرى',
            ]);

        }
    }

    /* company dates */
    public function GetCompanyDates($id)
    {
        $company_dates = CompanyDate::where('company_id', $id)->first();

        if ($company_dates) {
            return response()->json([
                'status' => true,
                'data' => new CompanyDateResource($company_dates)
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'لا توجد بيانات حتى الأن'
        ]);
    }

    /* add order */
    public function AddOrder(Request $request)
    {
        $client = Client::select('id')->where('api_token', $request->api_token)->first();
        $setting = Setting::select('commission_percentage', 'add_value')->first();

        $rules = [
            'company_id' => 'required|exists:companies,id',
            'code' => [
                Rule::exists('coupons')->where(function ($q) use ($request) {
                    $q->where('company_id', $request->company_id);
                    $q->whereDate('date_from', '<=', Carbon::now());
                    $q->whereDate('date_to', '>=', Carbon::now());
                })
            ],
            'location' => 'required',
            'lat' => 'required|numeric',
            'lon' => 'required|numeric',
            'name' => 'required',
            'mobile' => 'required',
            'day' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'time' => 'required|date_format:H:i',
            'payment_way' => 'required|in:on_deliver,visa',
            'visa_response' => 'required_if:payment_way,==,visa',
            'products' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        } else {
            try {
                DB::transaction(function () use ($request, $setting, $client) {
                    /*get coupon_percentage, add_value_percentage & commission_percentage*/
                    $coupon_percentage = null;
                    if ($request->filled('code')) {
                        $coupon_percentage = Coupon::select('percentage')->where(['company_id' => $request->company_id, 'code' => $request->code])->first()->percentage;
                    }
                    $add_value_percentage = $setting->add_value ?? 0;
                    $commission_percentage = $setting->commission_percentage ?? 0;

                    /* data of order */
                    $data = [
                        'client_id' => $client->id,
                        'company_id' => $request->company_id,
                        'add_value' => $add_value_percentage,
                        'coupon_code' => $request->code ?? null,
                        'coupon_percentage' => $coupon_percentage ?? null,
                        'location' => $request->location,
                        'lat' => $request->lat,
                        'lon' => $request->lon,
                        'name' => $request->name,
                        'mobile' => $request->mobile,
                        'day' => $request->day,
                        'time' => $request->time,
                        'payment_way' => $request->payment_way,
                        'visa_response' => $request->visa_response ?? null,
                        'status' => 'wait',
                        'commission_percentage' => $commission_percentage,
                        'client_date' => date('Y-m-d', strtotime("next ".$request->day, strtotime(Carbon::now()))),
                    ];
                    $order = Order::create($data);

                    /* adding products of order */
                    $total = 0;
                    foreach ($request->products as $product) {
                        $product_arr = explode(',', $product);
                        $product_ = Product::selectRaw('normal_price,mosque_price,offer_price')
                            ->where('id', $product_arr[0])->where('company_id', $request->company_id);
                        if($product_arr[2] == 'mosque'){$product_ = $product_->where('mosque', 1);}
                        elseif($product_arr[2] == 'offer'){$product_ = $product_->where('offer', 1);}
                        else{$product_ = $product_->where('normal', 1);}
                        $product_ = $product_->first();

                        if ($product_) {
                            if($product_arr[2] == 'mosque'){$product_price = $product_->mosque_price;}
                            elseif($product_arr[2] == 'offer'){$product_price = $product_->offer_price;}
                            else{$product_price = $product_->normal_price;}
                            $data2 = [
                                'order_id' => $order->id,
                                'product_id' => $product_arr[0],
                                'quantity' => $product_arr[1],
                                'type' => $product_arr[2],
                                'price' => ($product_price * $product_arr[1]),
                                'discount' => 0.0,
                                'after_discount' => ($product_price * $product_arr[1])
                            ];
                            $total += $data2['after_discount'];
                            OrderProduct::create($data2);
                        }
                    }

                    /* get total_after_add_value */
                    $add_value = (($add_value_percentage * $total) / 100);
                    $total_after_add_value = $total + $add_value;

                    /* get net after coupon_discount if there */
                    $coupon_discount = 0;
                    if ($coupon_percentage) {
                        $coupon_discount = (($coupon_percentage * $total_after_add_value) / 100);
                    }
                    $net = $total_after_add_value - $coupon_discount;

                    /* get commission_money */
                    $commission_money = (($commission_percentage * $net) / 100);
                    /* update total, net & commission_money*/
                    Order::find($order->id)->update([
                        'total' => $total_after_add_value,
                        'net' => $net,
                        'commission_money' => $commission_money
                    ]);

                    ## notification
                    $notify_msg = 'لديكم طلب جديد #' . $order->id;
                    Company::find($order->company_id)->notify(new OrderNewNotification($order->id, $notify_msg));
                });

                return response()->json([
                    'status' => true,
                    'message' => 'تم اضافة الطلب بنجاح'
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'حدث خطأ ما اثناء معالجة الطلب'
                ]);
            }
        }
    }

    /* current orders */
    public function GetCurrentOrders(Request $request)
    {
        $client = Client::select('id')->where('api_token', $request->api_token)->first();

        $current_orders = Order::selectRaw('id,company_id,net,status,who_cancel,cancel_reason,day,time,add_value')
            ->where('client_id', $client->id)->where('rate', null)->get();
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
    public function GetDoneOrders(Request $request)
    {
        $client = Client::select('id')->where('api_token', $request->api_token)->first();

        $done_orders = Order::selectRaw('id,company_id,net,status,who_cancel,cancel_reason,day,time,add_value')
            ->where('client_id', $client->id)->where('status', 'done')->where('rate', '!=', null)->get();
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

    /* rate order */
    public function RateOrder(Request $request)
    {
        $client = Client::select('id')->where('api_token', $request->api_token)->first();

        $rules = [
            'order_id' => 'required|numeric|exists:orders,id',
            'rate' => 'required|numeric|integer|min:1|max:5',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        } else {
            $order = Order::where('client_id', $client->id)
                ->where('id', $request->order_id)
                ->where('status', 'done')->first();

            if ($order) {
                $order->update(['rate' => $request->rate]);

                ## notification
                $notify_msg = 'تم الانتهاء وتقييم الطلب #' . $order->id;
                Company::find($order->company_id)->notify(new OrderDoneNotification($order->id, $notify_msg));

                return response()->json([
                    'status' => true,
                    'message' => 'تم تقييم الطلب بنجاح'
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'لا يوجد طلب بهذه البيانات'
            ]);
        }
    }

    /* cancel order */
    public function CancelOrder(Request $request)
    {
        $client = Client::select('id')->where('api_token', $request->api_token)->first();

        $rules = [
            'order_id' => 'required|numeric|exists:orders,id',
            'cancel_reason' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        } else {
            $order = Order::where('client_id', $client->id)
                ->where('id', $request->order_id)
                ->where('status', 'wait')->first();

            if ($order) {
                $order->update([
                    'who_cancel' => 'client',
                    'cancel_reason' => $request->cancel_reason,
                    'status' => 'cancel'
                ]);

                ## notification
                $notify_msg = 'تم الغاء الطلب #' . $order->id;
                Company::find($order->company_id)->notify(new OrderCancelNotification($order->id, $notify_msg));

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
    public function GetCancelReason(Request $request, $id)
    {
        $client = Client::select('id')->where('api_token', $request->api_token)->first();

        $order = Order::select('cancel_reason')->where('client_id', $client->id)
            ->where('id', $id)
            ->where('status', 'cancel')->first();

        if ($order) {
            return response()->json([
                'status' => true,
                'data' => $order->cancel_reason
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'لا يوجد طلب بهذه البيانات'
        ]);
    }

    /* order details */
    public function GetOrderDetails(Request $request, $id)
    {
        $client = Client::select('id')->where('api_token', $request->api_token)->first();

        $order = Order::selectRaw('id,company_id,total,add_value,net,representative_id')
            ->where('client_id', $client->id)
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

    /* notifications */
    public function GetNotifications(Request $request)
    {
        $client = Client::where('api_token', $request->api_token)->first();

        $notifications = $client->notifications;

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
    public function ReadNotification($id, Request $request)
    {
        $client = Client::where('api_token', $request->api_token)->first();

        $notification = $client->notifications->where('id', $id)->first();
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

    /* check coupon */
    public function CheckCoupon(Request $request)
    {
        $rules = [
            'company_id' => 'required|numeric|exists:companies,id',
            'code' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        }
        else{
            $coupon = Coupon::where(['company_id'=>$request->company_id,'code'=>$request->code])
                ->whereDate('date_from', '<=', Carbon::now())
                ->whereDate('date_to', '>=', Carbon::now())
                ->first();
            if($coupon){
                return response()->json([
                    'status' => true,
                    'data' => $coupon
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'كود كوبون خاطئ'
            ]);
        }
    }

    /* search */
    public function Search(Request $request)
    {
        $rules = [
            'city_id' => 'required|numeric|exists:cities,id',
            'company_id' => 'required|numeric|exists:companies,id',
            'product_id' => 'required|numeric',
            'kind' => 'required|in:carton,galon',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        }
        else{
            $products = Product::selectRaw('id,company_id,name,image,size,kind,normal,normal_price,mosque,mosque_price,offer,offer_price')
                ->where('company_id', $request->company_id);
            if($request->product_id > 0){
                $products = $products->where('id', $request->product_id);
            }else{
                $products = $products->where('kind', $request->kind);
            }
            $products = $products->where('hide', 'not_hide')->get();

            if($products->count() > 0){
                return response()->json([
                    'status' => true,
                    'data' => ProductResource::collection($products)
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'لا يوجد منتجات حتى الأن'
            ]);
        }
    }

    public function GetCities(){
        $cities = City::get();
        if($cities->count() > 0){
            return response()->json([
                'status' => true,
                'data' => CityResource::collection($cities)
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'لا يوجد مدن حتى الأن'
        ]);
    }

    public function GetCompaniesOfCity($id){
        $city_companies = CityCompany::where('city_id', $id)->with('CompanyDates')->get();
        if($city_companies->count() > 0){
            return response()->json([
                'status' => true,
                'data' => CityCompaniesResource::collection($city_companies)
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'لا يوجد شركات لهذه المدينة حتى الأن'
        ]);
    }
}
