<div class="sidebar-wrapper" data-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href="{{route('dashboard')}}"><img class="img-fluid"
                    src="{{asset('logo.jpg')}}" alt=""></a>
        </div>
        <div class="logo-icon-wrapper"><a href="{{route('dashboard')}}"><img class="img-fluid"
                    src="{{asset('logo.jpg')}}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="{{route('dashboard')}}"><img class="img-fluid"
                                src="{{asset('logo.jpg')}}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="pin-title sidebar-main-title">
                        <div>
                            <h6>Pinned</h6>
                        </div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1">General</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title"
                            href="{{route('dashboard')}}">
                            <span class="lan-3">Dashboard </span></a>
                       
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title"
                            href="{{route('schedule.index')}}">
                            <span class="">Schedule </span></a>
                       
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>