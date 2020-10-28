<?php

namespace App\Http\Controllers\company;


use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orderstoday = Order::where('company_id',auth()->guard('company')->user()->company_id)
            ->where('status','!=','cancel')
            ->whereDate('created_at', Carbon::now())->get();

        if($request->filled('from') and $request->filled('to')){
            $orderstoday = Order::where('company_id',auth()->guard('company')->user()->company_id)
                ->where('status','!=','cancel')
                ->whereDate('created_at', '>=', Carbon::parse($request->from))
                ->whereDate('created_at', '<=', Carbon::parse($request->to))
                ->get();
        }

        return view('company.siteaccount.index',compact('orderstoday'));
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
        //
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

    public function confirm($id)
    {
        $data = Order::findOrFail($id);
        $data->update(['admin_commission_agree'=>'agree']);

        return back()->with('success','تم التاكيد ع الطلب');
    }
}
