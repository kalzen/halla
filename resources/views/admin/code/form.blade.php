@extends('layouts.master')
@section('content')

        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <form action="{{route('code.store')}}" method="post">
                    @csrf
                <div class="card">
                  <div class="card-header">
                    <h4>Add new Model Code</h4>
                </div>
                  <div class="card-body">
                    <form class="row g-3 needs-validation custom-input" novalidate="">
                      <div class="col-md-4 position-relative mt-4">
                        <label class="form-label" for="validationTooltip01">Model</label>
                        <input class="form-control" id="validationTooltip01" type="text" name="name" placeholder="ABC" required="">
                        <div class="valid-tooltip">Looks good!</div>
                      </div>
                      <div class="col-md-4 position-relative mt-4">
                        <label class="form-label" for="validationTooltip03">Code</label>
                        <input class="form-control" id="validationTooltip03" type="text" name="code" required="">
                        <div class="valid-tooltip">Looks good!</div>
                      </div>
                      <div class="col-12 mt-4">
                        <button class="btn btn-primary" type="submit">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
                </form>
              </div>
              
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>

@endsection