<?php

namespace App\Http\Controllers\Admin;

use App\OrderProduct;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Company;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where(function ($q) {
            if (request()->input('search')) {
                $q->where('name', 'like', '%' . request()->search . '%');
            }
        })->paginate(10);

        $comp = null;
        return view('admins.products',compact('products','comp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.products',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        return $request->all();

        $messages =[
            'name.required'=>'الاسم مطلوب',
            'size.required'=>'الحجم مطلوب',
            'normal_price.required'=>'السعر العادي مطلوب',
            'offer_price.required'=>'السعر العادي مطلوب',
            'mosque_price.required'=>'السعر العادي مطلوب',

        ];
        $products =[
            'name' => 'required',
            'size' => 'required',
           'normal_price' => 'required',
            'normal_offer' => 'numeric',
            'normal_mosque' => 'numeric',
        ];

        $this->validate($request,$products,$messages);
        $request->merge(['company_id' =>($request->offer == 'on')?1:0]);
        $request->merge(['offer' =>($request->offer == 'on')?1:0]);

        $request->merge(['mosque' =>($request->mosque == 'on')?1:0]);

        $data = Product::create($request->all());
        $data->save();
//        dd(222);
        return redirect(url('/admin/product'))->with('success','تم الاضافه بنجاح');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comp = Company::findOrFail($id);
        $products = Product::where("company_id",$id)->paginate(10);

        return view('admins.products', compact('products','comp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $product = Product::findOrFail($id);


        $this->validate(request(), [
            'name' => 'required',
            'size' => 'required',
            'normal_price' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'size' => $request->size,
            'normal_price' => $request->normal_price,
            'mosque' => $request->mosque ?? 0,
            'mosque_price' => $request->mosque_price ?? 0,
            'offer' => $request->offer ?? 0,
            'offer_price' => $request->offer_price ?? 0
        ];

        $product->update($data);

        return redirect(url('admin/product  '))->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order_products = OrderProduct::where('product_id', $id)->get()->count();
        if($order_products > 0){
            return redirect(route('product.index'))->with('error', 'لا يمكن حذف المنتج لوجود تعاملات معه');
        }
        $data = Product::findOrFail($id);
        $data->delete();
        return redirect(route('product.index'))->with('success','تم الحذف بنجاح');
    }
}
