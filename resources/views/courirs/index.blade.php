<!-- MASTER -->
@extends('layouts.admin')

{{-- Title  --}}
@section('title')
<title>Data Kurir</title>
@endsection
{{-- END Title  --}}

@section('header')
<!-- Page header -->
<div class="page-header">
     <!-- Breadcrumb -->
     <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
               <div class="breadcrumb">
                    <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Halaman</a>
                    <span class="breadcrumb-item active">Kurir</span>
               </div>
          </div>
     </div>
     <!-- /Breadcrumb -->

     <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
               <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Halaman</span> - Tambah
                    Kurir</h4>
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
                    <div class="col-md-8">
                         <div class="card">

                              {{-- Bagian Header Halaman --}}
                              <div class="card-header">
                                   <h4 class="card-title">
                                        List Kurir
                                   </h4>
                              </div>

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

                                   {{-- Table --}}
                                   <div class="table-responsive">
                                        <table class="table table-hover table-bordered" id="courirTable">

                                             <thead>
                                                  <tr>
                                                       <th> Name </th>
                                                       <th> Sector </th>
                                                       <th> Status </th>
                                                       <th> Created At </th>
                                                       <th> Action </th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                             </tbody>
                                        </table>
                                   </div>
                                   {{-- END Table --}}

                              </div>

                         </div>
                    </div>
                    {{-- END List Courir --}}

                    {{-- Tambah Courir --}}
                    <div class="col-md-4">
                         <div class="card">
                              {{-- Header --}}
                              <div class="card-header">
                                   <h4 class="card-title">Tambah Kurir</h4>
                              </div>
                              {{-- END Header --}}

                              {{-- Body --}}
                              <div class="card-body">
                                   <form action="{{ route('courir.store') }}" method="post">
                                        @csrf
                                        {{-- Nama --}}
                                        <div class="form-group">
                                             <label for="name">Nama Kurir</label>
                                             <input type="text" name="name" class="form-control"
                                                  value="{{ old('name') }}" required>
                                             <p class="text-danger">{{ $errors->first('name') }}</p>
                                        </div>

                                        {{-- Status --}}
                                        <div class="form-group">
                                             <label for="status">Status</label>
                                             <select name="status" class="form-control" required>
                                                  <option value="active"
                                                       {{ old('status') == 'active' ? 'selected':'' }}>Aktiv</option>
                                                  <option value="non-active"
                                                       {{ old('status') == 'non-active' ? 'selected':'' }}>Tidak Aktiv
                                                  </option>
                                             </select>
                                             <p class="text-danger">{{ $errors->first('status') }}</p>
                                        </div>

                                        {{-- Sector --}}
                                        <div class="form-group">
                                             <label for="">Sector</label>
                                             <select class="form-control" name="sector_id" required>
                                                  <option value="">Pilih Sector</option>
                                                  @foreach ($sector as $row)
                                                  <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                  @endforeach
                                             </select>
                                             <p class="text-danger">{{ $errors->first('sector_id') }}</p>
                                        </div>

                                        <div class="form-group">
                                             <button class="btn btn-primary btn-sm float-right">Tambah</button>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>
                    {{-- END Tambah Courir --}}
               </div>
          </div>
     </div>
     {{-- END Bagian Inti --}}

     @include('courirs.modal')

</main>
@endsection

{{-- Script --}}
@section('js')

{{-- Datatable --}}
<script>
     $(document).ready(function(){
          $('#courirTable').DataTable({
               processing:true,
               serverside:true,
               ajax:"{{ route('ajax.get.data.courir.index') }}",
               columns:[
                    {data:'name',name:'name'},
                    {data:'sector_name',name:'sector_name'},
                    {data:'label_status',name:'label_status'},
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

@endsection