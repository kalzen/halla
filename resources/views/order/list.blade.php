@extends('master')

@section('title', 'Danh sách đơn hàng')
@section('content')
   <div class="card shadow mb-4 w-100">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ngày tạo</th>
                            <th>Xem đơn hàng</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>ID</th>
                            <th>Ngày tạo</th>
                            <th>Xem đơn hàng</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td><a href="{{route('order.show', ['id'=>$order->id])}}">Xem đơn hàng</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@stop