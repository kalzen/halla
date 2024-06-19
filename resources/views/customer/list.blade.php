@extends('master')

@section('title', 'Danh sách khách hàng')
@section('content')
   <div class="card shadow mb-4 w-100">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách khách hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Đơn hàng</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Đơn hàng</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->first_name }}</td>
                            <td>{{ $customer->last_name }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td><a href="{{route('order.show', ['id'=>$customer->order->id])}}">Đơn hàng số: {{$customer->order->id}}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@stop