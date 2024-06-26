@extends('layouts.master')
@section('content')
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Quản lý Model Code</h4>
                        <a href="{{route('code.create')}}">Thêm mới</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive theme-scrollbar">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        
                                        <th>Model</th>
                                        <th>Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($codes as $code)
                                    
                                    
                                    <tr>
                                        <td>{{$code->name}}</td>
                                        <td>{{$code->code}}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scroll - vertical dynamic Ends-->
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection