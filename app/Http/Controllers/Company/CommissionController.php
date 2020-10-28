<?php

namespace App\Http\Controllers\company;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commissions = Order::where('status', '!=', 'cancel')
            ->where('company_id',auth()->guard('company')->user()->company_id)
            ->get();
        return view('company.commissions.index',compact('commissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $order = Order::where(['id'=>$id,'company_id'=>auth()->guard('company')->user()->company_id]);
        if($order){
            if($request->payment_way == 'e_payment'){
                $order->update([
                    'commission_payment' => 'e_payment',
                    'e_response' => 'true'
                ]);
            }else{
                $image = $request->file('convert_image');
                $name =  time() .'_'.'.'.$image->getclientoriginalextension();
                $image->move('public/commission/', $name);

                $order->update([
                    'commission_payment' => 'bank',
                    'convert_image' => $name
                ]);
            }

            return back()->with('success', 'تم دفع العمولة بنجاح');
        }

        return back()->with('error', 'بيانات الطلب خاطئة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
