<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function all()
    {
        $customers = Customer::all();
        return view("customer.list", compact("customers"));
    }
    public function show($id)
    {
        $order = Customer::find($id);
        return view("customer.detail", compact("customer"));
    }
}
