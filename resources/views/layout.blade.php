<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.2-dist\css\bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.4.2-web\css\all.min.css')}}">
    <title>WEB BÁN SÁCH</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .nav-item .nav-link{
        color:white;
      }

      .nav-item .nav-link:hover{
        color:blue;
      }

      .container-fluid{
        overflow: hidden
      }

      .sidebar-sticky{
        margin-bottom: -5000px; /* any large number will do */
        padding-bottom: 5000px; 
      }
    </style>
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="">Dashboard</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="{{route('xu-ly-dang-xuat')}}">Sign out</a>
    </div>
  </div>
</header>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('san-pham.index')}}">
              <span data-feather="home" class="align-text-bottom"><i class="fa-solid fa-house"></i> Home</span>
            </a>
          </li>
        <p style="color:grey">QUẢN LÝ DANH MỤC</p>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('san-pham.index')}}">
              <span data-feather="home" class="align-text-bottom"><i class="fa-solid fa-book"></i> Sách</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('loai-san-pham.index')}}">
              <span data-feather="home" class="align-text-bottom"><i class="fa-solid fa-bars"></i> Thể loại</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('admin.index')}}">
              <span data-feather="home" class="align-text-bottom"><i class="fa-solid fa-user"></i> Nhân viên</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('hoa-don')}}">
              <span data-feather="home" class="align-text-bottom"><i class="fa-solid fa-file-invoice"></i> Đơn hàng</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('nha-cung-cap.index')}}">
              <span data-feather="home" class="align-text-bottom"><i class="fa-solid fa-truck-ramp-box"></i> Nhà cung cấp</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">
              <span data-feather="home" class="align-text-bottom"><i class="fa-solid fa-building-user"></i> Nhà sản xuất</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">
              <span data-feather="home" class="align-text-bottom"><i class="fa-solid fa-pencil"></i> Tác giả</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">
              <span data-feather="home" class="align-text-bottom"><i class="fa-solid fa-image"></i> Banner</span>
            </a>
          </li>
          <p style="color:grey">NHẬP/XUẤT HÀNG</p>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('nhap-hang')}}">
              <span data-feather="home" class="align-text-bottom"><i class="fa-solid fa-download"></i> Nhập hàng</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">
              <span data-feather="home" class="align-text-bottom"><i class="fa-solid fa-truck"></i> Xuất hàng</span>
            </a>
          </li>
          <p style="color:grey">BÁO CÁO THỐNG KÊ</p>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">
              <span data-feather="home" class="align-text-bottom"><i class="fa-solid fa-chart-simple"></i> Doanh thu</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">
              <span data-feather="home" class="align-text-bottom"><i class="fa-solid fa-chart-simple"></i> SL hàng bán ra</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">
              <span data-feather="home" class="align-text-bottom"><i class="fa-solid fa-gear"></i> Cài đặt</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>

      @if(session('thongbaodangnhap'))
      <div class="alert alert-success">
          {{session('thongbaodangnhap')}}
      </div>
      @endif

      @if(session('thong-bao'))
      <div class="alert alert-success">
          {{session('thong-bao')}}
      </div>
      @endif

      <div class="table-responsive">
        @yield('content')
      </div>
    </main>
  </div>
  </div>
      <script src="{{asset('bootstrap-5.3.2-dist\js\bootstrap.min.js')}}"></script>
        @yield('js')
  </body>
</html>

