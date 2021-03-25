<!-- MASTER -->
@extends('layouts.admin')

{{-- Title --}}
@section('title')
<title>List Produk</title>
@endsection
{{-- END Title --}}

@section('header')
<!-- Page header -->
<div class="page-header">
     <!-- Breadcrumb -->
     <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
               <div class="breadcrumb">
                    <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Halaman</a>
                    <span class="breadcrumb-item active">Produk</span>
               </div>
          </div>
     </div>
     <!-- /Breadcrumb -->

     <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
               <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Halaman</span> - Produk
               </h4>
               <a href="/" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
          </div>
     </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<main class="main">

     {{-- Bagian Inti --}}
     <div class="content">
          <div class="card">

               {{-- Bagian Header Halaman --}}
               <div class="card-header">
                    <h3 class="card-title">
                         <strong>List Product</strong>

                         <!-- BUAT TOMBOL UNTUK MENGARAHKAN KE HALAMAN ADD PRODUK -->
                         <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-right">Tambah</a>

                    </h3>
               </div>

               {{-- Bagian Body Halaman --}}
               <div class="card-body">
                    <!-- JIKA TERDAPAT FLASH SESSION, MAKA TAMPILAKAN -->
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <!-- JIKA TERDAPAT FLASH SESSION, MAKA TAMPILAKAN -->

                    <!-- TABLE-->
                    <div class="table table-responsive">
                         <table class="table table-hover table-bordered" id="productTable">
                              <thead>
                                   <tr>
                                        <th> Nama </th>
                                        <th> Harga </th>
                                        <th> Jenis Satuan </th>
                                        <th> Tanggal Penambahan </th>
                                        <th> Status </th>
                                        <th> Kategori </th>
                                        <th> Action </th>
                                   </tr>
                              </thead>
                              <tbody>
                              </tbody>
                         </table>
                    </div>
                    <!-- END TABLE -->
               </div>
          </div>
     </div>
     {{-- END Bagian Inti --}}

     @include('products.modal')

</main>
@endsection

{{-- Script --}}
@section('js')
<script src="{{ asset('global_assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
<script src="{{ asset('global_assets/js/demo_pages/colors_orange.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/tables/footable/footable.min.js')}}"></script>
<script src="{{ asset('global_assets/js/demo_pages/table_responsive.js')}}"></script>
<script src="{{ asset('global_assets/js/demo_pages/extra_sweetalert.js')}}"></script>
<script>
     $(document).ready(function(){
          $('#productTable').DataTable({
               processing:true,
               serverside:true,
               ajax:"{{ route('ajax.get.data.product.index') }}",
               columns:[
                    {data:'name',name:'name'},
                    {data:'format_price',name:'format_price'},
                    {data:'typeunit',name:'typeunit'},
                    {data:'format_date_crt',name:'format_date_crt'},
                    {data:'label_status',name:'label_status'},
                    {data:'category.name',name:'category.name'},
                    {data:'action',name:'view',orderable: false, searchable: false},        
               ]
          });
     });

</script>


<script>
     // display a modal (Show modal)
$(document).on('click', '#showButton', function(event) {
    event.preventDefault();
    let href = $(this).attr('data-attr');
    $.ajax({
        url: href,
        beforeSend: function() {
            $('#loader').show();
        },
        // return the result
        success: function(result) {
            $('#showModal').modal("show");
            $('#showBody').html(result).show();
        },
        complete: function() {
            $('#loader').hide();
        },
        error: function(jqXHR, testStatus, error) {
            console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
            $('#loader').hide();
        },
        timeout: 8000
    })
});


// display a modal ( Edit modal)
$(document).on('click', '#editButton', function(event) {
    event.preventDefault();
    let href = $(this).attr('data-attr');
    $.ajax({
        url: href,
        beforeSend: function() {
            $('#loader').show();
        },
        // return the result
        success: function(result) {
            $('#editModal').modal("show");
            $('#editBody').html(result).show();
        },
        complete: function() {
            $('#loader').hide();
        },
        error: function(jqXHR, testStatus, error) {
            console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
            $('#loader').hide();
        },
        timeout: 8000
    })
});


// display a modal ( Delete modal)
$(document).on('click', '#deleteButton', function(event) {
    event.preventDefault();
    let href = $(this).attr('data-attr');
    $.ajax({
        url: href,
        beforeSend: function() {
            $('#loader').show();
        },
        // return the result
        success: function(result) {
            $('#deleteModal').modal("show");
            $('#deleteBody').html(result).show();
        },
        complete: function() {
            $('#loader').hide();
        },
        error: function(jqXHR, testStatus, error) {
            console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
            $('#loader').hide();
        },
        timeout: 8000
    })
});

</script>

@endsection