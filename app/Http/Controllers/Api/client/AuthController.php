<?php

namespace App\Http\Controllers\Api\client;

use App\Client;
use App\Http\Resources\ClientResource;
use App\Notifications\PublicNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function return_errors($validator){
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

    public function Login(Request $request)
    {
        $rules = [
            'mobile' => 'required',
            'password' => 'required',
            'player_id' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        }
        else {
            $user = Client::where('mobile', $request->mobile)
                ->where('stop', 'not_stop')->first();
            $token = str_random(60);

            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    if ($user->active_code == null) {

                        $user->api_token = $token;
                        $user->player_id = $request->player_id;
                        $user->save();


                        return response()->json([
                            'status' => true,
                            'data' => new ClientResource($user),
                            'active' => true
                        ]);
                    }
                    else {
                        return response()->json([
                            'status' => false,
                            'message' => 'الحساب غير مفعل حتى الأن ... برجاء تفعيل حسابك',
                            'client_id' => $user->id
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'كلمه المرور غير صحيحه'
                    ]);
                }
            }
            else {
                return response()->json([
                    'status' => false,
                    'message' => 'العميل غير موجود'
                ]);
            }
        }
    }

    public function Logout(Request $request)
    {
        $client = Client::where('api_token', $request->api_token)->first();

        $client->player_id = null;
        $client->api_token = null;
        $client->save();
        return response()->json([
            'status' => true,
            'message' => 'تم الخروج بنجاح'
        ]);

    }

    public function SignUp(Request $request)
    {
        $messages = [
            'name.unique' => 'هذا الاسم مستخدم من قبل',
            'mobile.unique' => 'هذا الجوال مستعمل من قبل',
            'pass.min' => 'يجب إدخال كلمة المرور كحد أدنى 6 حروف أو أرقام',
            'pass.confirmed' => 'تأكيد كلمة المرور غير مشابه لكلمة المرور',
        ];
        $rules = [
            'mobile' => 'required|ksa_phone|unique:clients,mobile',
            'name' => 'required|max:120|unique:clients,name',
            'password' => 'required|min:6|confirmed',
            'player_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        }
        else {
            $client = new Client();
            $client->name = $request->name;
            $client->mobile = $request->mobile;

//            $active_code = rand(100000,999999);
            $active_code = null;
            $client->active_code = $active_code;

            $client->password = Hash::make($request->password);
            $client->api_token = str_random(60);
            $client->player_id = $request->player_id;
            $client->save();

            ## notification
            $notify_msg = 'اهلا وسهلا بكم فى تطبيق السقيا';
            $client->notify(new PublicNotification($notify_msg));
            if($client->player_id and !in_array($client->player_id, ['', null])){
                $tokens = [$client->player_id];
                $data = ['type' => 'public'];
                sendNoteClient($tokens, $notify_msg, $data);
            }

            $msg = 'تم تسجيل الحساب بنجاح ... يمكنك الدخول الأن';
            return response()->json([
                'status' => true,
                'data' => new ClientResource($client),
                'message' => $msg
            ]);
        }

    }

    public function ResetPassword(Request $request)
    {
        $messages = [
            'e_mail.required' => ' الايميل مطلوب',
            'e_mail.email' => 'صيغه الايميل خاطئه',
        ];
        $rules = [
            'e_mail' => 'required|email',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        }
        else{
            $client = Client::selectRaw('id,e_mail,name,active_code,api_token,player_id')->where('e_mail', $request->e_mail)->first();
            if ($client and $client->e_mail != null) {
                $active_code = rand(000000, 999999);
                $data = array(
                    'active_code' => $active_code,
                    'name' => $client->name,
                    'img' => Haraj_Altarf_Info::findOrFail(1)->logo
                );
                Mail::send('mail.mail2', $data, function ($message) use ($request) {
                    $message->to($request->e_mail)
                        ->subject('Haraj al-tarf Active Code');
                });

                $client->active_code = $active_code;
                $client->api_token = null;
                $client->player_id = null;
                $client->save();

                return response()->json([
                    'status' => true,
                    'advertiser_id' => $client->id,
                    'message' => 'تم ارسال الكود لتغيير كلمه المرور'
                ]);

            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'لا يوجد حساب مطابق'
                ]);
            }
        }
    }

    public function NewPasswordSave(Request $request)
    {
        $messages = [
            'active_code.required' => 'كود التفعيل مطلوب',
            'password.required' => 'برجاء ادخال كلمه المرور  ',
            'password.confirmed' => 'كلمه المرور ليست متطابقه ',
            'advertiser_id.required' => 'بيانات المعلن مطلوبة',
        ];
        $rules = [
            'active_code' => 'required',
            'password' => 'required|min:6|confirmed',
            'advertiser_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        }
        else{
            $client = Client::selectRaw('active_code,password,id')->where('id', $request->advertiser_id)->first();
            if ($client) {
                if ($client->active_code == $request->active_code) {
                    $client->active_code = null;
                    $client->password = Hash::make($request->password);
//                    $token = str_random(60);
//                    $client->api_token = $token;
//                    $client->player_id = $request->player_id;
                    $client->save();
                    return response()->json([
                        'status' => true,
                        'advertiser_id' => $client->id,
                        'message' => "تم تغيير كلمه المرور بنجاح"
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => "كود التفعيل غير صحيح"
                    ]);
                }

            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'بيانات المعلن خطأ'
                ]);
            }
        }
    }
}
