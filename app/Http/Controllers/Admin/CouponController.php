<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupones = Coupon::where(function ($q) {
            if (request()->input('search')) {
                $q->where('code', 'like', '%' . request()->search . '%');
            }
        })->paginate(10);
      $companies = Company::all();
      return view('admins.coupones',compact('coupones','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admins.coupones',compact('companies'));
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
            'code.required'=>'The Coupone_code is Required',
            'company_id.required'=>'The Company is Required',
            'percentage.required'=>'The percentage is Required',
            'date_to.required'=>'The Date_to is Required',
        ];
        $coupones =[
            'code' => 'required|unique:coupons',
            'company_id' => 'required',
            'percentage' => 'required',
            'date_to' => 'required',
        ];
        $this->validate($request,$coupones,$messages);

        $data = Coupon::create($request->all());
        $data->save();

        return redirect(url('/admin/coupon'))->with('success','تم الاضافه بنجاح');
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

        $data = Coupon::findOrFail($id);

        $this->validate(request(),[
            'code' => 'required|unique:coupons,code,'.$data->id,
            'percentage' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
            'company_id' => 'required'

        ]);
        $data->update($request->all());

        return redirect(url('admin/coupon  '))->with('success','تم التعديل بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = Coupon::findOrFail($id);
        $data->delete();
        return redirect(route('coupon.index'))->with('success','تم الحذف بنجاح');
    }
}
