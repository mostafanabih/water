<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Representative;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $user_id = auth()->guard('company')->user()->company_id;
        $countProduct = Product::where("company_id",$user_id)->count();
        $countRepresentative = Representative::where(["company_id"=>$user_id , "role"=>"representative"])->count();
        $Representatives = Representative::where(["company_id"=>$user_id , "role"=>"representative"])->get();
        $currentorders = Order::where('company_id',$user_id)
            ->whereDate('created_at', Carbon::now())->get();

        return view('company.home' ,compact('Representatives', 'countProduct' , 'countRepresentative','currentorders'));
    }
}
