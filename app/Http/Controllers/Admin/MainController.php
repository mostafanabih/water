<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Company;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Representative;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $rules = Company::paginate(10);
        return view('main',compact('rules'));
    }
    public function main()
    {
        $clients = Client::all();
        $companies = Company::all();
        $products = Product::all();
        $orderscancel = Order::where('status','!=','end');
        $representative = Representative::where('role', 'representative')->get();

        $orderstoday = Order::where('status','!=','cancel')
          ->whereDate('created_at', Carbon::now())->get();

        return view('admins.main',compact('clients','companies','products','orderscancel','orderstoday','representative'));
    }



}
