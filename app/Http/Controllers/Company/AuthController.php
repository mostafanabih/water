<?php

namespace App\Http\Controllers\Company;

use App\Admin;
use App\City;
use App\Company;
use App\Http\Controllers\Controller;
use App\Representative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function get_company_login()
    {
        if (Auth::guard('company')->check())
        {
            return redirect(route('home-company'));
        }
        else {
            return view('company.login');
        }
    }
    public function post_company_login()
    {
        $user = Representative::where('user_name', \request('user_name'))
            ->where('role', 'responsible')
            ->first();

        if($user){
            $user_ = Representative::where('id', $user->id)->where('active', 'active')->first();
            if($user_){
                $card = ['user_name'=>\request('user_name'), 'password'=>\request('password')];

                if (Auth::guard('company')->attempt($card, false))
                {
                    Auth::guard('company')->login($user);
                    return redirect(route('home-company'));
                } else {
                    return back()->with('error','يوجد خطا في البيانات الرجاء التاكد من البريد الالكتروني وكلمه المرور');
                }
            }
            return back()->with('error', 'طلب تسجيل حساب جارى الموافقة عليه من قبل الادارة');
        }
        return back()->with('error', 'لا يوجد حساب مطابق');
    }


    public function getRegister()
    {
        if (Auth::guard('company')->check())
        {
            return redirect(route('home-company'));
        }
        else {
            return view('company.register')->with('cities', City::all());
        }
    }


    public function register(Request $request)
    {
        $rules = [
            'name' => 'required',
            'mobile' => 'required',
            'name2' => 'required',
            'user_name' => 'required',
            'email' => 'required|email|unique:clients',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'pic1' => 'required',
            'pic2' => 'required',
            'cities' => 'required',
        ];
        $messages = [
            'name.required' => 'اسم الشركه مطلوب',
            'mobile.required' => 'رقم التليفون مطلوب',
            'name2.required' => 'اسم المسؤل مطلوب',
            'user_name.required' => 'اسم المستخدم مطلوب',
            'email.required' => 'البريد الالكتروني مطلوب',
            'password.required' => 'الرقم السري مطلوب',
            'pic1.required' => 'صوره الشركه مطلوب',
            'pic2.required' => ' صوره السجل التجاري للشركه مطلوبه',
        ];
        $this->validate($request, $rules, $messages);

        /* company adding */
        $data = [
            'name' => $request->name,
            'mobile' => $request->mobile,
            'image' => '',
            'commercial_register_image' => ''
        ];
        if ( $request->hasFile('pic1')  ) {
            $image = $request->pic1;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move(public_path().'/company', $image_new_name);
            $data['image'] = $image_new_name;
        }
        if ( $request->hasFile('pic2')  ) {
            $image2 = $request->pic2;
            $image_new_name2 = time() . $image2->getClientOriginalName();
            $image2->move(public_path().'/company', $image_new_name2);
            $data['commercial_register_image'] = $image_new_name2;
        }
        $company = Company::create($data);

        /* responsible adding */
        $data2 = [
            'company_id' => $company->id,
            'name' => $request->name2,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_name' => $request->user_name,
            'role' => 'responsible',
        ];
        Representative::create($data2);

        /* cities adding */
        $company->CityCompany()->sync($request->cities);

        return redirect(url('/company/login'))->with('success', 'تم انشاء الحساب بنجاح ... يمكنك تسجيل الدخول عند موافقة الادارة');

    }

    public function logout(){
        auth()->guard('company')->logout();
        return redirect(url('company/login'));
    }
}
