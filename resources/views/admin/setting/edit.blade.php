@extends('layouts.master')
@section('content')

        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Chỉnh sửa</h4>
                </div>
                  <div class="card-body">
                  @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                  @endif
                  @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                  @endif
                  <form class="dropzone" id="dropzone" enctype="multipart/form-data" id="singleFileUpload" action="{{route('setting.update')}}" method="post">
                  @csrf
                  <input type="hidden" name="setting_id" value="{{ $setting->id }}">
                      <div class="m-0 dz-message needsclick"><i class="icon-cloud-up"></i>
                        <h5 class="f-w-600 mb-0">Drop files here or click to upload.</h5>
                      </div>
                      <input type="hidden" name="file" value="">
                    </form>
                    <div class="col-12 mt-4">
                        <a class="btn btn-primary submit" href="{{route('setting.index')}}">Back</a>
                      </div>
                  </div>
                  
                  
                </div>
              </div>
              
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>

@endsection
