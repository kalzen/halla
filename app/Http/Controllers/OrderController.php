<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function all()
    {
        $orders = Order::all();
        return view("order.list", compact("orders"));
    }
    public function show($id)
    {
        $order = Order::find($id);
        return view("order.detail", compact("order"));
    }
}
