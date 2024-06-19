<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        $orders = Order::all();
        $customers = Customer::all();
        $sale = 0;
        foreach ($orders as $order)
        {
            $sale += $order->products->count();
        }
        return view("dashboard", compact("products","orders","customers","sale"));
    }
}
