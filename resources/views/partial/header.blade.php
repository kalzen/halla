<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Đồ án</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Quản trị
</div>

<li class="nav-item">
  <a class="nav-link" href="{{route('category.all')}}">Quản lý danh mục sản phẩm</a>
  <a class="nav-link" href="{{route('product.all')}}">Quản lý sản phẩm</a>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Sale
</div>
<li class="nav-item">
  <a class="nav-link" href="{{route('order.all')}}">Quản lý đơn hàng</a>
  <a class="nav-link" href="{{route('customer.all')}}">Quản lý khách hàng</a>
</li>

</ul>
<!-- End of Sidebar -->