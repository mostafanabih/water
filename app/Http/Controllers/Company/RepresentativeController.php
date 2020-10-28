<?php

namespace App\Http\Controllers\company;

use App\Representative;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $reps = Representative::where('company_id',auth()->guard('company')->user()->company_id)
            ->where('role','representative')
        ->where(function ($q) {
            if (request()->input('search')) {
                $q->where('name', 'like', '%' . request()->search . '%');
            }
        })->paginate(10);
        return view('company.representatives.index',compact('reps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.representatives.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages =[
            'name.required'=>'الاسم مطلوب',
            'mobile.required'=>'رقم التليفون مطلوب',
            'password.required'=>'الرقم السري مطلوب',
            'email.required'=>'البريد الالكتروني مطلوب',
            'user_name.required'=>' اسم المستخدم مطلوب',


        ];
        $reps =[
            'name' => 'required',
            'mobile' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required',
            'user_name' => 'required',


        ];
        $this->validate($request,$reps,$messages);
        $data = [

            'password' => bcrypt($request->password),
            'name' => $request->name,
            'mobile'=> $request->mobile,
            'email'=> $request->email,
            'user_name'=> $request->user_name,
            'active'=> 'active',
            'company_id'=> auth()->guard('company')->user()->company_id,
        ];


         Representative::create($data);


        return redirect(url('/company/representative'))->with('success','تم الاضافه بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Representative::findOrFail($id);


         $this->validate(request(),[
            'name' => 'required',
            'mobile' => 'required',


        ]);
        $data->update($request->all());

        $data->save();

        return redirect(url('company/representative  '))->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = Representative::findOrFail($id);
        $data->delete();
        return redirect(route('representative.index'))->with('success','تم الحذف بنجاح');
    }

    public function changePassword(Request $request, $id)
    {


        $rules = [
            'password' => 'required|confirmed',
        ];
        $this->validate($request, $rules);
        $rep = Representative::where('id','=',$id)->first();

        $rep->password = bcrypt($request->input('password'));
        $rep->save();
        return back()->with('success', 'تم تحديث كلمه المرور');
    }

    public function stoprep(Request $request, $id)
    {

        $data = Representative::findOrFail($id);
        $data->update(['active'=>$request->status]);
        return redirect(url('company/representative'))->with('success','تمت العمليه بنجاح');
    }
}
