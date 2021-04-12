{{-- MASTER --}}
@extends('layouts.admin')

{{-- Title --}}
@section('title')
<title> Dashboard </title>
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
                    <span class="breadcrumb-item active">Dashboard</span>
               </div>
          </div>
     </div>
     <!-- /Breadcrumb -->
</div>
<!-- /page header -->
@endsection

@section('content')
<main class="main">
     {{-- Bagian Inti --}}
     <div class="container-fluid">
          <div class="animated fadeIn">
               <div class="row">
                    <div class="col-lg">
                         <div class="card">
                              <div class="card-header header-elements-inline">
                                   <h3 class="card-title">
                                        <strong>
                                             Daftar Pesanan Menunggu
                                        </strong>
                                        <span class="badge badge-warning mr-2"> Waiting </span>
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
                                        <table class="table table-hover table-bordered" id="waitingOrderTable">
                                             <thead>
                                                  <tr>
                                                       <th> Invoice </th>
                                                       <th> Nama Pelanggan </th>
                                                       {{-- <th> Jenis Pesanan </th> --}}
                                                       <th> Area </th>
                                                       {{-- <th> Sector </th> --}}
                                                       <th> Waktu Pengiriman </th>
                                                       <th> Tanggal Pengiriman </th>
                                                       <th> Tanggal Penambahan </th>
                                                       {{-- <th> Total </th> --}}
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
                    <div class="col-lg">
                         <div class="card">
                              <div class="card-header header-elements-inline">
                                   <h3 class="card-title">
                                        <strong>
                                             Pengiriman
                                        </strong>
                                        <span class="badge badge-info mr-2"> Delivery </span>
                                   </h3>
                              </div>

                              <div class="card-body">
                                   <div>
                                        <!-- FLASH SESSION-->
                                        @if (session('success_delivery'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif

                                        @if (session('error_delivery'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                        @endif
                                        <!-- END FLASH SESSION-->

                                        <!-- TABLE -->
                                        <table class="table table-hover table-bordered" id="deliveryProcessTable">
                                             <thead>
                                                  <tr>
                                                       <th> Delivery Code </th>
                                                       <th> Waktu Pengiriman </th>
                                                       <th> Tanggal Pengiriman </th>
                                                       <th> Tanggal Penambahan </th>
                                                       <th> Status </th>
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

     @include('dashboards.modal')

</main>
@endsection

{{-- Script --}}
@section('js')

{{-- Datatable --}}
<script>
     $(document).ready(function(){
          $('#waitingOrderTable').DataTable({
               processing:true,
               serverside:true,
               ajax:"{{ route('ajax.get.data.order.dashboard.waiting') }}",
               columns:[
                    {data:'invoice',name:'invoice'},
                    {data:'customer_name',name:'customer_name'},
                    // {data:'format_scheduled',name:'format_scheduled'},
                    {data:'detailSector_name',name:'detailSector_name'},
                    // {data:'sector.name',name:'sector.name'},
                    {data:'delivery_time',name:'delivery_time'},
                    {data:'format_date_delivery',name:'format_date_delivery'},
                    {data:'format_date_crt',name:'format_date_crt'},
                    // {data:'format_total',name:'format_total'},
                    {data:'action',name:'view',orderable: false, searchable: false}, 
               ]
          });
     });
</script>
<script>
     $(document).ready(function(){
          $('#deliveryProcessTable').DataTable({
               processing:true,
               serverside:true,
               ajax:"{{ route('ajax.get.data.delivery.dashboard.process') }}",
               columns:[
                    {data:'delivery_code',name:'delivery_code'},
                    {data:'delivery_time',name:'delivery_time'},
                    {data:'format_date_delivery',name:'format_date_delivery'},
                    {data:'format_date_crt',name:'format_date_crt'},
                    {data:'label_status',name:'label_status'},
                    {data:'action',name:'view',orderable: false, searchable: false}, 
               ]
          });
     });
</script>

{{-- END Datatable --}}

{{-- Click Modal --}}
<script>
     // display a modal (Show modal)
          $(document).on('click', '#deliveryButton', function(event) {
          event.preventDefault();
          let href = $(this).attr('data-attr');
          $.ajax({
               url: href,
               beforeSend: function() {
                    $('#loader').show();
               },
               // return the result
               success: function(result) {
                    $('#deliveryModal').modal("show");
                    $('#deliveryBody').html(result).show();
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