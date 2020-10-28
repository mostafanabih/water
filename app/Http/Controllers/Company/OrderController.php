<?php

namespace App\Http\Controllers\Company;

use App\Client;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
    public function index( Request $request )
    {
        $company_id = auth()->guard('company')->user()->company_id;

        $orders = Order::query()
            ->where('company_id', $company_id)
            ->where('rate', null);

        if ($request->filled('id')){
            $orders = $orders->where("id",$request->id);
        }
        if ($request->filled('from')){
            $orders = $orders->whereDate("created_at",'>=' ,Carbon::parse($request->from));
        }
        if ($request->filled('to')){
            $orders = $orders->whereDate("created_at",'<=' ,Carbon::parse($request->to));
        }
        if ($request->filled('status')){
            $orders = $orders->where("status",$request->status);
        }
        if ($request->filled('payment')){
            $orders = $orders->where("payment_way",$request->payment);
        }
        if ($request->filled('client_id')){
            $orders = $orders->where("client_id",$request->client_id);
        }


        $orders = $orders->paginate(10);

        $clients = Client::select("id","name")->get();

        return view('company.orders.index' ,compact(  'orders','clients'));
    }

    public function store(Request $request){

//        return $request->all();
//        $this->validate($request, [
//            'image' => 'required|image',
//            'name' => 'required'
//        ]);
        $user_id = auth()->guard('company')->user()->company_id;
        $product = new Product();
        $product->name = $request->name;
        $product->size = $request->size;
        $product->normal = $request->normal ?? 0;
        $product->normal_price = $request->normal_price ?? 0;
        $product->mosque = $request->mosque  ?? 0;
        $product->mosque_price = $request->mosque_price ?? 0;
        $product->offer = $request->offer  ?? 0;
        $product->offer_price = $request->offer_price ?? 0;
        $product->company_id = $user_id ;

        $image = $request->file('image');
        $name =  time() .'_'. date('y-m-d-H-i-s') . '.'. $image->getclientoriginalextension();
        $product->image = $name;
        $image->move('public/company/product/', $name);
        $product->save();

        return back()->with(['success' => 'تم الحفظ']);
    }

    public function update(Request $request , $id){
//        return $id;
//        return $request->all();
        $user_id = auth()->guard('company')->user()->company_id;

        $product = Product::where(["id"=>$id , "company_id"=>$user_id])->first();

        $product->name = $request->name ;
        $product->offer_price = $request->offer_price ;
        $product->normal_price = $request->normal_price ;
        $product->mosque_price = $request->mosque_price ;

        if ( $request->normal ){
            $product->normal = $request->normal ;
        }else{
            $product->normal = 0 ;
        }

        if ( $request->mosque ){
            $product->mosque = $request->mosque ;
        }else{
            $product->mosque = 0 ;
        }

        if ( $request->offer ){
            $product->offer = $request->offer ;
        }else{
            $product->offer = 0 ;
        }


        if ( $request->file('file') ){
            $image = $request->file('file');
            $name =  time() .'_'. date('y-m-d-H-i-s') . '.'. $image->getclientoriginalextension();
            $product->image = $name;
            $image->move('public/company/product/', $name);
        }


        $product->save() ;

        return redirect()->back();
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('company.orders.orderdetails',compact('order'));
    }

    public function destroy( $id)
    {
        $authId = auth()->guard('company')->user()->company_id;
        $product = Product::where(["id"=>$id , "company_id"=>$authId])->first();

        if($product){
            File::delete('public/company/product/'.$product->image);
            $product->delete();
            return back()->with(['success' => 'تم المسح بنجاح ']);
        }
        return back()->with(['error' => 'فشل التعرف علي المنتج']);
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
    public function confirmRep(Request $request,$id)
    {

        $data = Order::findOrFail($id);
        $data->update(['representative_id'=>$request->representative,'status'=>'process']);

        return back()->with('success','تم تحويل الطلب الي المندوب');
    }
}
