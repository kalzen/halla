@extends('master')

@section('title', 'Chi tiết sản phẩm')
@section('content')
<form class="col-12" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
	<div class="card shadow mb-4 w-100">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm mới</h6>
		</div>
		<div class="card-body">
		@csrf
 
    <!-- Equivalent to... -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<div class="mb-3">
				<label for="productName" class="form-label">Tên sản phẩm</label>
				<input type="text" class="form-control" id="productName" value="" name="name">
			</div>
			<div class="mb-3">
				<div class="form-group">
				<label for="images">Ảnh sản phẩm</label>
				<input type="file" name="images" id="images" class="form-control-file" value="" required>
				</div>
			</div>
            <div class="mb-3 input-group">
            <div class="form-group">
				<label for="category" class="form-label">Danh mục sản phẩm</label>
                <select class="form-select" id="category" name="category_id">
                    <option selected>Chọn danh mục sản phẩm</option>
                    @foreach($categories as $cate )
					<option value="{{$cate->id}}">{{$cate->name}}</option>
					@endforeach
                </select>
                </div>
			</div>
			<div class="mb-3">
				<label for="productPrice" class="form-label">Giá sản phẩm</label>
				<input type="text" class="form-control" id="productPrice" value="" name="price">
			</div>
			<div class="mb-3">
				<label for="productColor" class="form-label">Màu sắc</label>
				<input type="text" class="form-control" id="productColor" value="" name="color">
			</div>
            <div class="mb-3">
				<label for="description" class="form-label">Mô tả sản phẩm</label>
				<textarea class="form-control" row="3" id="description" name="description"></textarea>
			</div>
			<div class="mb-3">
				<label for="editor" class="form-label">Chi tiết sản phẩm</label>
				<textarea class="form-control" id="editor" name="content"> </textarea>
			</div>
			<button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
		</div>
	</div>
</form>
@stop