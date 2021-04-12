{{-- Template untuk page admin (Master) --}}
<!DOCTYPE html>
<html lang="en">

{{-- Header --}}

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Vegan Store - Belanja Mudah dari Rumah">
  <meta name="author" content="Vegan Store">
  <meta name="keyword" content="aplikasi jual sayur-mayur dan kebutuhan pokok">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin_2/assets/images/vegan_store_logo.png')}}">

  {{-- JUDUL --}}
  @yield('title')

  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="{{ asset('global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('global_assets/sub_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('global_assets/sub_assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('global_assets/sub_assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('global_assets/sub_assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('global_assets/sub_assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('global_assets/sub_assets_2/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('global_assets/sub_assets_2/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('global_assets/sub_assets_2/css/layout.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('global_assets/sub_assets_2/css/components.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('global_assets/sub_assets_2/css/colors.min.css')}}" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->
</head>

{{-- Body --}}

<body>

  {{-- Navbar --}}

  @include('layouts.module.header')

  {{-- Sidebar + Content + Header(Crumb) --}}
  @yield('header')

<div class="page-content pt-0">
  @include('layouts.module.sidebar')


  {{-- Content --}}
  @yield('content')
</div>



  {{-- Footer --}}
  <footer class="app-footer">
    <div class="navbar navbar-expand-lg navbar-light">
      <div class="text-center d-lg-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
          data-target="#navbar-footer">
          <i class="icon-unfold mr-2"></i>
          Footer
        </button>
      </div>

      <div class="navbar-collapse collapse" id="navbar-footer">
        <span class="navbar-text">
          &copy; 2021. <a >Vegan Store</a> by <a 
            target="_blank">Vegan Store Team</a>
        </span>
      </div>
    </div>
  </footer>
  {{-- /Footer --}}

  {{-- JS Master Page --}}
  <!-- Core JS files -->
  <script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
  <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
  <script src="{{ asset('global_assets/js/plugins/ui/ripple.min.js') }}"></script>
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script src="{{ asset('global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
  <script src="{{ asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
  <script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
  <script src="{{ asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
  <script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
  <script src="{{ asset('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>

  <script src="{{ asset('global_assets/js/plugins/forms/inputs/inputmask.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/extensions/jquery_ui/core.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/wizards/steps.min.js')}}"></script>
  
  <script src="{{ asset('global_assets/sub_assets/js/app.js') }}"></script>
  <script src="{{ asset('global_assets/sub_assets_2/js/app.js')}}"></script>
	{{-- <script src="{{ asset('global_assets/js/demo_pages/form_wizard.js')}}"></script> --}}
  <!-- /theme JS files -->

  <!-- Datatable JS files -->
  <script src="{{ asset('DataTables/datatables.js') }}"></script>
  <!-- /Datatable JS files -->

  {{-- JS Custom Page  --}}
  @yield('js')

</body>


</html>