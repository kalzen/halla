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
                        <h4>Quản lý lịch trình</h4><span>Lịch trình dây chuyền sản xuất</span>
                        <a href="{{route('schedule.create')}}">Thêm mới</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive theme-scrollbar">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Model</th>
                                        <th>Dayplan</th>
                                        <th>UHP</th>
                                        <th>Input</th>
                                        <th>Defect</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedules as $schedule)
                                    
                                    
                                    <tr>
                                        <td>{{$schedule->date}}</td>
                                        <td>{{$schedule->model}}</td>
                                        <td>{{$schedule->dayplan}}</td>
                                        <td>{{$schedule->uhp}}</td>
                                        <td>{{$schedule->input}}</td>
                                        <td>{{$schedule->defect}}</td>
                                        
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