<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::where(function ($q) {
            if (request()->input('search')) {
                $q->where('name', 'like', '%' . request()->search . '%');
            }
        })->paginate(10);
        return view('admins.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.users', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages =[
            'name.required'=>'الاسم مطلوب',
            'email.required'=>'البريد الالكتروني مطلوب',
            'password.required'=>'الرقم السري مطلوب',
        ];
        $users =[
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'password' => 'required|confirmed',
        ];
        $this->validate($request,$users,$messages);


        $request->merge([
            'password' => bcrypt($request->password),
            'active' => 'active',
            'role_id' => 2,
        ]);


        $data = Admin::create($request->except(['password_confirmation']));
        $data->save();

        return redirect(url('/admin/user'))->with('success','تم الاضافه بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $data = Admin::findOrFail($id);
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);
        $data->update($request->all());

        return redirect(url('admin/user  '))->with('success', 'تم التعديل بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = Order::where('admin_agree_by', $id)->get()->count();
        if($orders > 0){
            return back()->with('error', 'لا يمكنك حذف هذا المستخدم لوجود تعاملات له');
        }

        Admin::findOrFail($id)->delete();
        return back()->with('success','تم الحذف بنجاح');
    }

    public function changePassword($id, Request $request)
    {
        $rules = [
            'password' => 'required|confirmed',
        ];
        $this->validate($request, $rules);

        $user = Admin::findOrFail($id);
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return back()->with('success', 'تم تحديث كلمه المرور');
    }
}