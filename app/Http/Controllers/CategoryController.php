<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function show($id)
    {
        $category = Category::find(request("id"))->first();
        return view("category/edit",compact('category'));
    }
    public function all()
    {   
        $categories = Category::all();
        return view("category.list",compact("categories"));
    }
    public function update(Request $request, $id)
    {
        $input = $request->except("_token");
        if ( $request->hasFile("image")) {
            $image = $request->file('image');
            $storedPath = $image->move('image', $image->getClientOriginalName());
        $input["image"] = $storedPath;
        //$request->file('image')->storeAs('images', 'avatar.jpg', 'local');
        }
        $category = Category::find($id);
        $category->update($input);
        return redirect()->route("category.update", $id)->with("success","Cập nhật sản phẩm thành công");
    }
    public function destroy(Request $request, $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route("category.all")->with("success","Xóa sản phẩm thành công");
    }
    public function store(Request $request)
    {
        $input = request()->except("_token");
        if ( $request->hasFile("image")) {
            $image = $request->file('image');
            $storedPath = $image->move('image', $image->getClientOriginalName());
        $input["image"] = $storedPath;
        //$request->file('image')->storeAs('images', 'avatar.jpg', 'local');
        }
        $category = Category::create($input);
        return redirect()->route('category.all')->with('success','Thêm sản phẩm thành công');
    }
}
