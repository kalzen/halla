@extends('layouts.master')
@section('content')
<!-- Page Sidebar Ends-->
<div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid default-dashboard"> 
            <div class="row widget-grid">
              <div class="col-xl-5 col-md-6 proorder-xl-1 proorder-md-1">  
                <div class="card profile-greeting p-0">
                  <div class="card-body">
                    <div class="img-overlay">
                      <h1>Good day, Halla</h1>
                      <p>Welcome to the Halla family! We are delighted that you have visited our dashboard.</p><a class="btn" href="index.html">Go Premium</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6 proorder-xl-2 proorder-md-2">
                <div class="card">
                  <div class="card-header card-no-border pb-0">
                    <div class="header-top">
                      <h4>Opening of Manufactory</h4>
                      <div class="dropdown icon-dropdown">
                        <button class="btn dropdown-toggle" id="userdropdown17" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown17"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pb-0 opening-box">
                    <div class="d-flex align-items-center gap-2"> 
                      <h2> 12,463</h2>
                      <div class="d-flex">
                        <p class="mb-0 up-arrow"><i class="fa fa-arrow-up"></i></p><span class="f-w-500 font-success">+ 20.08%</span>
                      </div>
                    </div>
                    <div id="growthchart"> </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-5 proorder-xl-3 proorder-md-3"> 
                <div class="card shifts-char-box">
                  <div class="card-header card-no-border pb-0">
                    <div class="header-top"> 
                      <h4>Shifts Overview  </h4>
                      
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row"> 
                      <div class="col-5"> 
                        <div class="overview" id="shifts-overview"></div>
                      </div>
                      <div class="col-7 shifts-overview">
                        <div class="d-flex gap-2"> 
                          <div class="flex-shrink-0"><span class="bg-primary"> </span></div>
                          <div class="flex-grow-1"> 
                            <h6>Input</h6>
                          </div><span>86</span>
                        </div>
                        <div class="d-flex gap-2"> 
                          <div class="flex-shrink-0"><span class="bg-secondary"></span></div>
                          <div class="flex-grow-1"> 
                            <h6>Defect</h6>
                          </div><span>210</span>
                        </div>
                        <div class="d-flex gap-2"> 
                          <div class="flex-shrink-0"><span class="bg-warning"> </span></div>
                          <div class="flex-grow-1"> 
                            <h6>Assigned</h6>
                          </div><span>95</span>
                        </div>
                        <div class="d-flex gap-2"> 
                          <div class="flex-shrink-0"><span class="bg-tertiary"></span></div>
                          <div class="flex-grow-1"> 
                            <h6>Cancelled</h6>
                          </div><span>37</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
             
              <div class="col-xl-5 col-md-7 proorder-xl-4 box-col-5 proorder-md-6"> 
                <div class="card">
                  <div class="card-header card-no-border pb-0">
                    <div class="header-top">
                      <h4>Chart per week</h4>
                      <div class="dropdown icon-dropdown">
                        <button class="btn dropdown-toggle" id="userdropdown11" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown11"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pb-0">
                    <div id="customer-transaction"></div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-7 col-xl-12 box-col-12 proorder-xl-8 proorder-md-9"> 
                <div class="card">
                  <div class="card-header card-no-border pb-0">
                    <div class="header-top">
                      <h4>Statistic</h4>
                      <div class="dropdown icon-dropdown">
                        <button class="btn dropdown-toggle" id="userdropdown14" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown14"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body sale-statistic">
                    <div class="row"> 
                      <div class="col-3 statistic-icon">    
                        <div class="light-card balance-card widget-hover">
                          <div class="icon-box"><img src="{{asset('assets/images/dashboard/icon/customers.png')}}" alt=""></div>
                          <div> <span class="f-w-500 f-light">Input</span>
                            <h5 class="mt-1 mb-0">1.736</h5>
                          </div>
                          <div class="ms-auto text-end">
                            <div class="dropdown icon-dropdown">
                              <button class="btn dropdown-toggle" id="incomedropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="incomedropdown"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday </a></div>
                            </div><span class="f-w-600 font-success">+3,7%</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-3 statistic-icon"> 
                        <div class="light-card balance-card widget-hover">
                          <div class="icon-box"><img src="{{asset('assets/images/dashboard/icon/revenue.png')}}" alt=""></div>
                          <div> <span class="f-w-500 f-light">Defect</span>
                            <h5 class="mt-1 mb-0">9.247   </h5>
                          </div>
                          <div class="ms-auto text-end">
                            <div class="dropdown icon-dropdown">
                              <button class="btn dropdown-toggle" id="expensedropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="expensedropdown"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday </a></div>
                            </div><span class="f-w-600 font-danger">-0,10%</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-3 statistic-icon">
                        <div class="light-card balance-card widget-hover">
                          <div class="icon-box"><img src="{{asset('assets/images/dashboard/icon/profit.png')}}" alt=""></div>
                          <div> <span class="f-w-500 f-light">Target</span>
                            <h5 class="mt-1 mb-0">80%</h5>
                          </div>
                          <div class="ms-auto text-end">
                            <div class="dropdown icon-dropdown">
                              <button class="btn dropdown-toggle" id="cashbackdropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cashbackdropdown"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday </a></div>
                            </div><span class="f-w-600 font-success">+11,6%</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="chart-dash-2-line"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
@endsection