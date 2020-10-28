<?php

namespace App\Http\Controllers\Api\representative;

use App\Http\Resources\RepresentativeResource;
use App\Representative;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
            'user_name' => 'required',
            'password' => 'required',
            'player_id' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->return_errors($validator);
        }
        else {
            $user = Representative::where('user_name', $request->user_name)
                ->where('role', 'representative')->first();
            $token = str_random(60);

            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    if ($user->active == 'active') {

                        $user->api_token = $token;
                        $user->player_id = $request->player_id;
                        $user->save();

                        return response()->json([
                            'status' => true,
                            'data' => new RepresentativeResource($user),
                            'active' => true
                        ]);
                    }
                    else {
                        return response()->json([
                            'status' => false,
                            'message' => 'الحساب غير مفعل حتى الأن'
                        ]);
                    }
                }
                else {
                    return response()->json([
                        'status' => false,
                        'message' => 'اسم المستخدم أو كلمه المرور غير صحيحه'
                    ]);
                }
            }
            else {
                return response()->json([
                    'status' => false,
                    'message' => 'المندوب غير موجود'
                ]);
            }
        }
    }

    public function Logout()
    {
        $client = auth()->guard('IsRepresentative')->user();

        $client->player_id = null;
        $client->api_token = null;
        $client->save();
        return response()->json([
            'status' => true,
            'message' => 'تم الخروج بنجاح'
        ]);

    }
}
