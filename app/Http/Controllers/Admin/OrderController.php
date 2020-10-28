<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Company;
use App\Order;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::all();
        $companies = Company::where(function ($q) {
            if (request()->input('search')) {
                $q->where('name', 'like', '%' . request()->search . '%');
            }
        })->paginate(10);

       $orders = Order::query();
        if($request->filled('id')){
        $orders = $orders->where('id', $request->id);
        }
        if($request->filled('from')){
            $orders = $orders->whereDate('created_at', '>=', Carbon::parse($request->from));
        }
        if($request->filled('to')){
            $orders = $orders->whereDate('created_at', '<=', Carbon::parse($request->to));
        }
        if($request->filled('status')){
            $orders = $orders->where('status', $request->status);
        }
        if($request->filled('payment_way')){
            $orders = $orders->where('payment_way', $request->payment_way);
        }
        if($request->filled('commission_payment')){
            $orders = $orders->where('commission_payment', $request->commission_payment);
        }
        if($request->filled('client_id')){
            $orders = $orders->where('client_id', $request->client_id);
        }
        if($request->filled('company_id')){
        $orders = $orders->where('company_id', $request->company_id);
        }
//        if($request->has('product_size')){
//            $orders = $orders->where('size', $request->product_size);
//        }
//        if($request->has('product_state')){
//            $orders = $orders->where('', $request->company_id);
//        }
        $orders = $orders->orderBy('created_at','desc')->paginate(10);

//        dd($orders);
       return view('admins.orders',compact('orders','clients','companies'));
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

        $order = Order::findOrFail($id);
//        return $order;
        return view('admins.orderdetails',compact('order'));
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

        $data = Order::findOrFail($id);
        $data->delete();
        return redirect(route('order.index'))->with('success','تم الحذف بنجاح');
    }
    public function confirm(Request $request, $id)
    {
        $data = Order::findOrFail($id);
        $data->update(['representative_id'=>$request->representative,'status'=>'process']);

        return back()->with('success','تم التاكيد ع الطلب');
    }
    public function cancel(Request $request, $id)
    {
        $data = Order::findOrFail($id);
        $data->update(['cancel_reason'=>$request->cancelreason,'status'=>'cancel','who_cancel'=>'company']);

        return back()->with('success','تم الغاء الطلب');
    }

    public function reportValueAdded (Request $request){

        $orders = Order::query()->where('status', '!=', 'cancel');

        if($request->filled('from')){
            $orders = $orders->whereDate('created_at', '>=', Carbon::parse($request->from));
        }
        if($request->filled('to')){
            $orders = $orders->whereDate('created_at', '<=', Carbon::parse($request->to));
        }
        $orders = $orders->paginate(15);

        return view('admins.reportValueAdded',compact('orders'));

    }
}
