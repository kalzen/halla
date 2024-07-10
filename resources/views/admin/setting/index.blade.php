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
                        <h4>Setting</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive theme-scrollbar">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Path</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($settings as $setting)
                                    
                                    
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$setting->type}}</td>
                                        <td>{{$setting->name}}</td>
                                        <td>{{$setting->value}}</td>
                                        <td><a href="{{route('setting.edit', ['id' => $setting->id])}}">Chỉnh sửa</a></td>
                                        
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