@extends('master')

@section('title', 'Chi tiết danh mục')
@section('content')
<form class="col-12" action="{{route('category.update', ['id' => $category->id])}}" method="post" enctype="multipart/form-data">
	<div class="card shadow mb-4 w-100">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Sửa danh mục - {{ $category->name }}</h6>
		</div>
		<div class="card-body">
		@csrf
 
    <!-- Equivalent to... -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<div class="mb-3">
				<label for="productName" class="form-label">Tên danh mục</label>
				<input type="text" class="form-control" id="productName" value="{{ $category->name}}" name="name">
			</div>
			<div class="mb-3">
				<div class="form-group">
				<label for="image">Ảnh danh mục</label>
					<img style="max-width: 100px" src="{{asset($category->image)}}" alt="">
				<input type="file" name="image" id="image" class="form-control-file" value="{{$category->image}}">
				</div>
			</div>
			<div class="mb-3">
				<label for="description" class="form-label">Mô tả danh mục</label>
				<textarea class="form-control" row="3" id="description" name="description">{{$category->description}}</textarea>
			</div>
			<button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
		</div>
	</div>
</form>
@stop