<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    //
    public function show($id)
    {
        $product = Product::find(request("id"))->first();
        $categories = Category::all();
        //var_dump("", $product);
        return view("product/edit",compact('product','categories'));
    }
    public function all()
    {   
        //$products = Product::aa;
        $products = Product::all();
        return view("product.list",compact("products"));
    }
    public function update(Request $request, $id)
    {
        $input = $request->except("_token");
        if ( $request->hasFile("images")) {
            $image = $request->file('images');
            $storedPath = $image->move('images', $image->getClientOriginalName());
        $input["images"] = $storedPath;
        //$request->file('image')->storeAs('images', 'avatar.jpg', 'local');
        }
        $product = Product::find($id);
        $product->update($input);
        return redirect()->route("product.update", $id)->with("success","Cập nhật sản phẩm thành công");
    }
    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route("product.all")->with("success","Xóa sản phẩm thành công");
    }
    public function store(Request $request)
    {
        $input = request()->except("_token");
        $image = $request->file('images');
            $storedPath = $image->move('images', $image->getClientOriginalName());
        $input["images"] = $storedPath;
        $product = Product::create($input);
        return redirect()->route('product.all')->with('success','Thêm sản phẩm thành công');
    }
}
