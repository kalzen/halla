@extends('master')

@section('title', 'Trang danh mục sản phẩm')
@section('content')
   <a href="{{route('category.store')}}" class="btn btn-primary mr-auto m-3">Thêm mới danh mục</a>
   <div class="card shadow mb-4 w-100">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách danh mục sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Mô tả</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Mô tả</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td><img style="max-width: 100px" src="{{ asset($category->image) }}" alt=""></td>
                            <td>{{ $category->description }}</td>
                            <td><a href="{{ route('category.update', ['id' => $category->id]) }}" class="badge text-primary">Chỉnh sửa</a><a href="{{ route('category.destroy', ['id' => $category->id]) }}" class="badge text-danger">Xóa</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@stop