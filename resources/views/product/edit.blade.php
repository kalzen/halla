@extends('master')

@section('title', 'Chi tiết sản phẩm')
@section('content')
<form class="col-12" action="{{route('product.update', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
	<div class="card shadow mb-4 w-100">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Sửa sản phẩm - {{ $product->name }}</h6>
		</div>
		<div class="card-body">
		@csrf
 
    <!-- Equivalent to... -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<div class="mb-3">
				<label for="productName" class="form-label">Tên sản phẩm</label>
				<input type="text" class="form-control" id="productName" value="{{ $product->name}}" name="name">
			</div>
			<div class="mb-3">
				<div class="form-group">
				<label for="images">Ảnh sản phẩm</label>
					<img style="max-width: 100px" src="{{asset($product->images)}}" alt="">
				<input type="file" name="images" id="images" class="form-control-file" value="{{$product->images}}">
				</div>
			</div>
			<div class="mb-3 input-group">
            <div class="form-group">
				<label for="category" class="form-label">Danh mục sản phẩm</label>
                <select class="form-select" id="category" name="category_id">
                    <option selected>Chọn danh mục sản phẩm</option>
                    @foreach($categories as $cate )
					<option @if($product->category_id == $cate->id) selected @endif value="{{$cate->id}}">{{$cate->name}}</option>
					@endforeach
                </select>
                </div>
			</div>
			<div class="mb-3">
				<label for="productPrice" class="form-label">Giá sản phẩm</label>
				<input type="text" class="form-control" id="productPrice" value="{{ $product->price}}" name="price">
			</div>
			<div class="mb-3">
				<label for="productColor" class="form-label">Màu sắc</label>
				<input type="text" class="form-control" id="productColor" value="{{ $product->color}}" name="color">
			</div>
			<div class="mb-3">
				<label for="description" class="form-label">Mô tả sản phẩm</label>
				<textarea class="form-control" row="3" id="description" name="description">{{$product->description}}</textarea>
			</div>
			<div class="mb-3">
				<label for="editor" class="form-label">Chi tiết sản phẩm</label>
				<textarea class="form-control" id="editor" name="content"> {!! $product->content !!}</textarea>
			</div>
			<button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
		</div>
	</div>
</form>
@stop