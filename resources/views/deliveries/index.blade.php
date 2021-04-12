{{-- MASTER --}}
@extends('layouts.admin')

{{-- Title --}}
@section('title')
<title> Data Pengririman (Delivery) </title>
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
                    <span class="breadcrumb-item active">Pengririman</span>
               </div>
          </div>
     </div>
     <!-- /Breadcrumb -->

     <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
               <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Halaman</span> - Pesanan
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
     <div class="container-fluid">
          <div class="animated fadeIn">
               <div class="row">
                    <div class="col-lg-12">
                         <div class="card">
                              <div class="card-header header-elements-inline">
                                   <h3 class="card-title">
                                        <strong>
                                             Pengiriman Selesai
                                        </strong>
                                        <span class="badge badge-success mr-2"> Success </span>
                                   </h3>
                              </div>

                              <div class="card-body">
                                   <div>
                                        <!-- FLASH SESSION-->
                                        @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif

                                        @if (session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                        @endif
                                        <!-- END FLASH SESSION-->

                                        <!-- TABLE -->
                                        <table class="table table-hover table-bordered" id="successDeliveryTable">
                                             <thead>
                                                  <tr>
                                                       <th> Delivery Code </th>
                                                       <th> Invoice </th>
                                                       <th> Kurir </th>
                                                       <th> Waktu Pengiriman </th>
                                                       <th> Tanggal Pengiriman </th>
                                                       <th> Tanggal Penambahan </th>
                                                       <th> Action </th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                             </tbody>
                                        </table>
                                        <!-- END TABLE -->
                                   </div>

                              </div>
                         </div>
                    </div>
               </div>
               <div class="row">
                    <div class="col-lg-12">
                         <div class="card">
                              <div class="card-header header-elements-inline">
                                   <h3 class="card-title">
                                        <strong>
                                             Pengiriman sedang Proses
                                        </strong>
                                        <span class="badge badge-info mr-2"> Delivery </span>
                                   </h3>
                              </div>

                              <div class="card-body">
                                   <div>
                                        <!-- FLASH SESSION-->
                                        @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif

                                        @if (session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                        @endif
                                        <!-- END FLASH SESSION-->

                                        <!-- TABLE -->
                                        <table class="table table-hover table-bordered" id="processDeliveryTable">
                                             <thead>
                                                  <tr>
                                                       <th> Delivery Code </th>
                                                       <th> Invoice </th>
                                                       <th> Kurir </th>
                                                       <th> Waktu Pengiriman </th>
                                                       <th> Tanggal Pengiriman </th>
                                                       <th> Tanggal Penambahan </th>
                                                       <th> Action </th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                             </tbody>
                                        </table>
                                        <!-- END TABLE -->
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     </div>
     {{-- END Inti --}}

     @include('deliveries.modal')

</main>
@endsection

{{-- Script --}}
@section('js')

{{-- Datatable --}}
<script>
     $(document).ready(function(){
          $('#successDeliveryTable').DataTable({
               processing:true,
               serverside:true,
               ajax:"{{ route('ajax.get.data.delivery.index.success') }}",
               columns:[
                    {data:'delivery_code',name:'delivery_code'},
                    {data:'invoice',name:'invoice'},
                    {data:'courir.name',name:'courir.name'},
                    {data:'delivery_time',name:'delivery_time'},
                    {data:'format_date_delivery',name:'format_date_delivery'},
                    {data:'format_date_crt',name:'format_date_crt'},
                    {data:'action',name:'view',orderable: false, searchable: false}, 
               ]
          });
     });
</script>
<script>
     $(document).ready(function(){
          $('#processDeliveryTable').DataTable({
               processing:true,
               serverside:true,
               ajax:"{{ route('ajax.get.data.delivery.index.delivery') }}",
               columns:[
                    {data:'delivery_code',name:'delivery_code'},
                    {data:'invoice',name:'invoice'},
                    {data:'courir.name',name:'courir.name'},
                    {data:'delivery_time',name:'delivery_time'},
                    {data:'format_date_delivery',name:'format_date_delivery'},
                    {data:'format_date_crt',name:'format_date_crt'},
                    {data:'action',name:'view',orderable: false, searchable: false}, 
               ]
          });
     });
</script>
{{-- END Datatable --}}

{{-- Click Modal --}}
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
{{-- END Click Modal --}}

{{-- Provinsi , kota --}}
<script>
     $('#province_id_sector').on('change', function() {
            $.ajax({
                url: "{{ url('/api/city') }}",
                type: "GET",
                data: { province_id: $(this).val() },
                success: function(html){
                    
                    $('#city_id_sector').empty()
                    $('#city_id_sector').append('<option value="">Pilih Kabupaten/Kota</option>')
                    $.each(html.data, function(key, item) {
                        var spasi = ' '; 
                        $('#city_id_sector').append('<option value="'+item.id+'">'+item.type+''+spasi+''+item.name+'</option>')
                    })
                }
            });
        })
     
     $('#province_id_detail').on('change', function() {
            $.ajax({
                url: "{{ url('/api/city') }}",
                type: "GET",
                data: { province_id: $(this).val() },
                success: function(html){
                    
                    $('#city_id_detail').empty()
                    $('#city_id_detail').append('<option value="">Pilih Kabupaten/Kota</option>')
                    $.each(html.data, function(key, item) {
                        var spasi = ' '; 
                        $('#city_id_detail').append('<option value="'+item.id+'">'+item.type+''+spasi+''+item.name+'</option>')
                    })
                }
            });
     })
</script>
{{-- END Provinsi , kota --}}

@endsection