<?php

namespace App\Http\Controllers\Api;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class CategoryController extends Controller
{
    //
    public function all()
    {
        $categories = Category::all(); 
        return response()->json($categories, Response::HTTP_OK);
    }
    public function show($id)
    {
        $category = Category::find($id);
        $products = $category->products()->orderBy("id","desc")->paginate(10);
        return response()->json(['category' => $category, 'products'=> $products], Response::HTTP_OK);
    }
}
