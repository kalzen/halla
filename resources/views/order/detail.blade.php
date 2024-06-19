@extends('master')

@section('title', 'Đơn hàng số '.$order->id)
@section('content')
	<div class="card shadow mb-4 w-100">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Thông tin khách hàng</h6>
		</div>
		<div class="card-body">
			<span class="mb-3 w-100 d-block">Ngày tạo <b>{{$order->created_at}}</b></span>
            <span class="mb-3 w-100 d-block"><b class="mr-3">First Name:</b>{{$order->customer->first_name}}</span>
            <span class="mb-3 w-100 d-block"><b class="mr-3">Last Name:</b>{{$order->customer->last_name}}</span>
            <span class="mb-3 w-100 d-block"><b class="mr-3">Phone:</b>{{$order->customer->phone}}</span>
            <span class="mb-3 w-100 d-block"><b class="mr-3">Địa chỉ:</b>{{$order->customer->address}}</span>
		</div>
	</div>
    <div class="card shadow mb-4 w-100">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Sản phẩm đã đặt hàng</h6>
		</div>
		<div class="card-body">
            <ul class="list-group">
                @foreach ($order->products as $product)
                <li class="list-group-item"><a href="{{route('product.show', ['id'=>$product->id])}}">{{$product->name}}</a></li>
                @endforeach
            </ul>
		</div>
	</div>
@stop