<?php

namespace App\Http\Controllers\Api;
use App\Models\Customer;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    //
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $input = $request->only('first_name','last_name','phone','address');
        $customer = Customer::create($input);
        $order = Order::create(['customer_id'=>$customer->id]);
        foreach ($request['products_id'] as $product_id)
        {
            $order->products()->attach($product_id);
        }
        //$customer->order()->createMany($request['product_id']);
        return response()->json($request, Response::HTTP_OK);
    }
}
