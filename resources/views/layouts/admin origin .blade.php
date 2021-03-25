{{-- Template untuk page admin (Master) --}}
<!DOCTYPE html>
<html lang="en">

{{-- Header --}}
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

	<meta name="author" content="Daengweb">
  <meta name="keyword" content="aplikasi ecommerce laravel, tutorial laravel basic, belajar laravel, panduan belajar laravel">
    
  {{-- JUDUL --}}
    @yield('title')

  {{-- CSS ASSET --}}
    <!-- UNTUK ME-LOAD ASSET DARI PUBLIC, KITA GUNAKAN HELPER ASSET() -->
    <link href="{{ asset('admin/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">
    <link href="{{ asset('DataTables/datatables.css') }}" rel="stylesheet">
    
</head>

{{-- Body --}}
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
  
    {{-- Navbar --}}
      <!-- KENAPA HEADER DIPISAHKAN? AGAR LEBIH RAPI SAJA JADI LEBIH MUDAH MAINTENANCENYA -->
      <!-- KETIKA MELOAD FILE BLADE, MAKA EKSTENSI .BLADE.PHP TIDAK PERLU DITULISKAN -->
      @include('layouts.module.header')
  
    {{-- Sidebar + Content --}}
      <div class="app-body" id="dw">
          <div class="sidebar">
            
              <!-- SIDEBAR JUGA KITA PISAHKAN CODENYA MENJADI FILE TERSENDIRI -->
              <!-- KETIKA MELOAD FILE BLADE, MAKA EKSTENSI .BLADE.PHP TIDAK PERLU DITULISKAN -->
              @include('layouts.module.sidebar')
            
              <button class="sidebar-minimizer brand-minimizer" type="button"></button>
          </div>
        
          {{-- Content --}}
            @yield('content')
        
      </div>

    {{-- Footer --}}
      <footer class="app-footer">
          <div>
              <a href="https://coreui.io">Daengweb</a>
              <span>&copy; 2018 creativeLabs.</span>
          </div>
          <div class="ml-auto">
              <span>Powered by</span>
              <a href="https://coreui.io">CoreUI</a>
          </div>
      </footer>
    
    {{-- JS Master Page --}}
      <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
      <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('admin/assets/js/pace.min.js') }}"></script>
      <script src="{{ asset('admin/assets/js/perfect-scrollbar.min.js') }}"></script>
      <script src="{{ asset('admin/assets/js/coreui.min.js') }}"></script>
      <script src="{{ asset('admin/assets/js/custom-tooltips.min.js') }}"></script>
      <script src="{{ asset('DataTables/datatables.js') }}"></script>
    
    {{-- JS Custom Page  --}}
      @yield('js')
</body>
</html>
