<?php

namespace App\Http\Controllers\Api;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    //
    public function all()
    {
        $products = Product::all();
        return response()->json($products, Response::HTTP_OK);
    }
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product, Response::HTTP_OK);
    }
    public function keyword(Request $request)
    {
        $product = Product::where("name","like","%". $request->keyword ."%")->get();
        return response()->json($product, Response::HTTP_OK);
    }
}
