<!-- MASTER -->
@extends('layouts.admin')

{{-- Title --}}
@section('title')
<title>List Customer</title>
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
                    <span class="breadcrumb-item active">Pelanggan</span>
               </div>
          </div>
     </div>
     <!-- /Breadcrumb -->

     <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
               <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Halaman</span> - Pelanggan
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

                    {{-- List Courir --}}
                    <div class="col-md-12">
                         <div class="card">

                              {{-- Bagian Header Halaman --}}
                              <div class="card-header">
                                   <h3 class="card-title">
                                        <strong>
                                             List Customer
                                        </strong>
                                   </h3>
                              </div>
                              {{-- END Bagian Header Halaman --}}

                              {{-- Bagian Body Halaman --}}
                              <div class="card-body">

                                   <!-- FLASH SESSION -->
                                   @if (session('success'))
                                   <div class="alert alert-success">{{ session('success') }}</div>
                                   @endif

                                   @if (session('error'))
                                   <div class="alert alert-danger">{{ session('error') }}</div>
                                   @endif
                                   <!-- END FLASH SESSION -->

                                   <!-- TABLE -->
                                   <div class="table-responsive">
                                        <table class="table table-hover table-bordered" id="customerTable">
                                             <thead>
                                                  <tr>
                                                       <th> Nama </th>
                                                       <th> Email </th>
                                                       <th> Sektor </th>
                                                       <th> Telepon </th>
                                                       <th> Tanggal Penambahan </th>
                                                       <th> Status </th>
                                                       <th> Action </th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                             </tbody>
                                        </table>
                                   </div>
                                   <!-- END TABLE -->

                              </div>
                              {{-- END Bagian Body Halaman --}}
                         </div>
                    </div>
               </div>
          </div>
     </div>
     {{-- END Bagian Inti --}}

     @include('customers.modal')


</main>
@endsection

{{-- Script --}}
@section('js')

<script>
     $(document).ready(function(){
          $('#customerTable').DataTable({
               processing:true,
               serverside:true,
               ajax:"{{ route('ajax.get.data.customer.index') }}",
               columns:[
                    {data:'name',name:'name'},
                    {data:'email',name:'email'},
                    {data:'sector.code',name:'sector.code'},
                    {data:'format_phone',name:'format_phone'},
                    {data:'format_date_crt',name:'format_date_crt'},
                    {data:'label_status',name:'label_status'},
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