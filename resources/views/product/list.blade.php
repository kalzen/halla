@extends('master')

@section('title', 'Trang sản phẩm')
@section('content')
   <a href="{{route('product.store')}}" class="btn btn-primary mr-auto m-3">Thêm mới sản phẩm</a>
   <div class="card shadow mb-4 w-100">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Giá sản phẩm</th>
                            <th>Color</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Giá sản phẩm</th>
                            <th>Color</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td><img style="max-width: 100px" src="{{ asset($product->images) }}" alt=""></td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->color }}</td>
                            <td><a href="{{ route('product.update', ['id' => $product->id]) }}" class="badge text-primary">Chỉnh sửa</a><a href="{{ route('product.destroy', ['id' => $product->id]) }}" class="badge text-danger">Xóa</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@stop