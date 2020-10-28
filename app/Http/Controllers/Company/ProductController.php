<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Product;
use App\Representative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index( Request $request )
    {
        $user_id = auth()->guard('company')->user()->Company->id;

        $products = Product::where("company_id",$user_id);

        if ($request->search){
            $products = $products->where('name', 'LIKE', '%' . $request->search . '%') ;
        };

        $products = $products->paginate(15);
        return view('company.products.index' ,compact('products'));
    }

    public function store(Request $request){

//        return $request->all();
//        $this->validate($request, [
//            'image' => 'required|image',
//            'name' => 'required'
//        ]);
        $user_id = auth()->guard('company')->user()->Company->id;
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
        $image->move('public/product/', $name);
        $product->save();

        return back()->with(['success' => 'تم الحفظ']);
    }

    public function update(Request $request , $id){
        $user_id = auth()->guard('company')->user()->Company->id;

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
            $image->move('public/product/', $name);
        }


        $product->save() ;

        return redirect()->back()->with('success','تم التعديل بنجاح');
    }

    public function destroy( $id){
        $authId = auth()->guard('company')->user()->Company->id;
        $product = Product::where(["id"=>$id , "company_id"=>$authId])->first();

        if($product){
            File::delete('public/product/'.$product->image);
            $product->delete();
            return back()->with(['success' => 'تم الحذف بنجاح ']);
        }
        return back()->with(['error' => 'فشل التعرف علي المنتج']);
    }
}
