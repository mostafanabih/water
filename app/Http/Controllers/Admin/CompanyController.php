<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Order;
use App\Representative;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::where(function ($q) {
            if (request()->input('search')) {
                $q->where('name', 'like', '%' . request()->search . '%');
            }
        })->paginate(10);

        return view('admins.companies', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admins.companies', compact('companies'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'mobile' => 'required',
            'commercial_register_image' => 'required',
            'image' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'name2' => 'required',
            'user_name' => 'required|unique:representatives',
        ];
        $message = [
            'name.required' => 'اسم الشركه مطلوب',
            'mobile.required' => 'رقم التليفون مطلوب',
            'commercial_register_image.required' => 'صوره السجل التجاري مطلوبه',
            'image.required' => 'صوره الشركه مطلوبه',
            'email.required' => 'رقم الحساب مطلوب',
            'password.required' => 'الرقم السري مطلوب ا',
            'name2.required' => ' المستخدم مطلوب ',
            'user_name.required' => 'اسم المستخدم مطلوب ',
        ];
        $this->validate($request, $rules, $message);


        $data = [
            'name' => $request->name,
            'mobile' => $request->mobile,
            'commercial_register_image' => '',
            'image' => '',
            'admin_agree' => 'agree',
            'active' => 'active',
        ];
        if ( $request->hasFile('image')  ) {
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move(public_path().'/company', $image_new_name);
            $data['image'] = $image_new_name;
        }
        if ( $request->hasFile('commercial_register_image')  ) {
            $image2 = $request->commercial_register_image;
            $image_new_name2 = time() . $image2->getClientOriginalName();
            $image2->move(public_path().'/company', $image_new_name2);
            $data['commercial_register_image'] = $image_new_name2;
        }
        $company = Company::create($data);


        $data2 = [
            'company_id' => $company->id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name2,
            'user_name'=> $request->user_name,
            'mobile'=> $request->mobile,
            'role'=>'responsible',
            'active'=>'active',
        ];

        Representative::create($data2);

        return redirect(url('admin/company'))->with('success', 'تم الاضافه بنجاح');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $company = Company::findOrFail($id);


        $this->validate(request(), [
            'name' => 'required',
            'mobile' => 'required',
            'name2' => 'required',
            'user_name' => 'required',
            'email' => 'required',


        ]);
        $data = [
            'name' => $request->name,
            'mobile' => $request->mobile,


        ];

        $company->update($data);

        $rep = Representative::findOrFail($id);
        $data2 = [

            'name' => $request->name2,
            'user_name' => $request->user_name,

        ];
        $rep->update($data2);

        return redirect(url('admin/company  '))->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = Order::where('company_id', $id)->get()->count();
        if($orders > 0){
            return redirect(route('company.index'))->with('error', 'لا يمكن حذف الشركة لوجود تعاملات معها');
        }
        $data = Company::findOrFail($id);
        $data->delete();
        return redirect(route('company.index'))->with('success', 'تم الحذف بنجاح');
    }

    public function changePassword(Request $request, $id)
    {

        $rules = [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ];
        $this->validate($request, $rules);

        $rep = Representative::where(['company_id'=>$id,'role'=>'responsible'])->first();
        if($rep){
            if (Hash::check($request->input('old_password'), $rep->password)) {
                $rep->password = bcrypt($request->input('password'));
                $rep->save();
                return back()->with('success', 'تم تحديث كلمه المرور');
            }
            else{
                return back()->with('error', 'كلمة المرور الحالية غير مطابقة');
            }
        }else{
            return back()->with('error', 'لا يوجد مسؤل لهذه الشركة');
        }
    }
    public function stopcompany(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        if($company->admin_agree == 'agree'){
            $msg = 'تم الايقاف بنجاح';
            if($request->status == 'active'){
                $msg = 'تم التفعيل بنجاح';
            }
            $company->update(['active'=>$request->status]);
            $Representatives = Representative::where('company_id', $id)->get();
            foreach($Representatives as $Representative){
                $Representative->update(['active'=>$request->status]);
            }

            return redirect(url('admin/company'))->with('success', $msg);
        }

        return redirect(url('admin/company_register'))->with('error','يجب الموافقة على طلب التسجيل اولا حتى يتم التفعيل');
    }
}