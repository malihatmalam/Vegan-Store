{{-- MASTER --}}
@extends('layouts.admin')

{{-- Title --}}
@section('title')
<title> List Sektor </title>
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
                    <span class="breadcrumb-item active">Sektor</span>
               </div>
          </div>
     </div>
     <!-- /Breadcrumb -->

     <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
               <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Halaman</span> - Sektor
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

                    {{-- List Sektor --}}
                    <div class="col-md-12">
                         <div class="card">

                              {{-- Bagian Header Halaman --}}
                              <div class="card-header">
                                   <h3 class="card-title">
                                        <strong>
                                             List Sektor
                                        </strong>
                                   </h3>
                              </div>
                              {{-- END Header --}}

                              {{-- Bagian Body Halaman --}}
                              <div class="card-body">

                                   <!-- FLASH SESSION-->
                                   @if (session('success'))
                                   <div class="alert alert-success">{{ session('success') }}</div>
                                   @endif

                                   @if (session('error'))
                                   <div class="alert alert-danger">{{ session('error') }}</div>
                                   @endif
                                   <!-- END FLASH SESSION-->

                                   <!-- TABLE -->
                                   <div class="table-responsive">
                                        <table class="table table-hover table-bordered" id="sectorTable">
                                             <thead>
                                                  <tr>
                                                       <th> Nama </th>
                                                       <th> Kode </th>
                                                       <th> Area </th>
                                                       <th> Tanggal Penambahan </th>
                                                       <th> Action </th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                             </tbody>
                                        </table>
                                   </div>
                                   <!-- END TABLE -->

                              </div>
                              {{-- END Body --}}

                         </div>
                    </div>
                    {{-- END List Sektor --}}

                    {{-- Tambah Sector --}}
                    <div class="col-md-6">
                         <div class="card">
                              {{-- Title --}}
                              <div class="card-header">
                                   <h3 class="card-title">
                                        <strong>
                                             Tambah Sektor
                                        </strong>
                                   </h3>
                              </div>
                              {{-- Content --}}
                              <div class="card-body">
                                   {{-- Tambah Sector --}}
                                   <form action="{{ route('sector.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                             <div class="col-lg-6">
                                                  {{-- Nama --}}
                                                  <div class="form-group">
                                                       <label for="name">
                                                            <strong>
                                                                 Nama Sektor
                                                            </strong>
                                                       </label>
                                                       <input type="text" name="name" class="form-control"
                                                            value="{{ old('name') }}" required>
                                                       <p class="text-danger">{{ $errors->first('name') }}</p>
                                                  </div>
                                             </div>
                                             <div class="col-lg-6">
                                                  {{-- Kode --}}
                                                  <div class="form-group">
                                                       <label for="name"><strong>Kode</strong></label>
                                                       <input type="text" name="code" class="form-control"
                                                            value="{{ old('code') }}" required>
                                                       <p class="text-danger">{{ $errors->first('code') }}</p>
                                                  </div>
                                             </div>
                                        </div>

                                        {{-- Provinsi --}}
                                        <div class="form-group">
                                             <label for=""><strong>Propinsi</strong></label>
                                             <select class="form-control" name="province_id" id="province_id_sector"
                                                  required>
                                                  <option value="">Pilih Propinsi</option>
                                                  @foreach ($province as $row)
                                                  <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                  @endforeach
                                             </select>
                                             <p class="text-danger">{{ $errors->first('province_id') }}</p>
                                        </div>

                                        {{-- Kota / Kabupaten --}}
                                        <div class="form-group">
                                             <label for=""><strong>Kabupaten / Kota</strong></label>
                                             <select class="form-control" name="city_id" id="city_id_sector" required>
                                                  <option value="">Pilih Kabupaten/Kota</option>
                                             </select>
                                             <p class="text-danger">{{ $errors->first('city_id') }}</p>
                                        </div>

                                        <div class="form-group">
                                             <button class="btn btn-primary btn-sm float-right">Tambah</button>
                                        </div>
                                   </form>
                                   {{-- END Tambah Sector --}}
                              </div>

                         </div>
                    </div>
                    {{-- END Tambah Sector --}}

                    {{-- Tambah Area --}}
                    <div class="col-md-6">
                         <div class="card">
                              {{-- Title --}}
                              <div class="card-header">
                                   <div class="card-title">
                                        <h3>
                                             <strong>
                                                  Tambah Area
                                             </strong>
                                        </h3>
                                   </div>
                              </div>
                              {{-- END Title --}}
                              {{-- Content --}}
                              <div class="card-body">
                                   {{-- Tambah Area --}}
                                   <form action="{{ route('sectorDetail.store') }}" method="post">
                                        @csrf

                                        {{-- Sector --}}
                                        <div class="col-md-12 form-group">
                                             <label for=""><strong>Sektor</strong></label>
                                             <select class="form-control" name="sector_id_detail" required>
                                                  <option value="">Pilih Sektor</option>
                                                  @foreach ($sector as $row)
                                                  <option value="{{ $row->id }}">{{ $row->name }} ( {{ $row->code }} )
                                                  </option>
                                                  @endforeach
                                             </select>
                                             <p class="text-danger">{{ $errors->first('sector_id_detail') }}</p>
                                        </div>

                                        {{-- Provinsi --}}
                                        <div class="col-md-12 form-group">
                                             <label for=""><strong>Propinsi</strong></label>
                                             <select class="form-control" name="province_id" id="province_id_detail"
                                                  required>
                                                  <option value="">Pilih Propinsi</option>
                                                  @foreach ($province as $row)
                                                  <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                  @endforeach
                                             </select>
                                             <p class="text-danger">{{ $errors->first('province_id') }}</p>
                                        </div>

                                        {{-- Kota / Kabupaten --}}
                                        <div class="col-md-12 form-group">
                                             <label for=""><strong>Kabupaten / Kota</strong></label>
                                             <select class="form-control" name="city_id_detail" id="city_id_detail"
                                                  required>
                                                  <option value="">Pilih Kabupaten/Kota</option>
                                             </select>
                                             <p class="text-danger">{{ $errors->first('city_id_detail') }}</p>
                                        </div>

                                        <div class="form-group">
                                             <button class="btn btn-primary btn-sm float-right">Tambah</button>
                                        </div>
                                   </form>
                                   {{-- END Tambah Area --}}
                              </div>
                         </div>
                         {{-- END Content --}}
                    </div>
               </div>
               {{-- END Area --}}

          </div>
     </div>
     </div>
     {{-- END Inti --}}

     @include('sectors.modal')

</main>
@endsection

{{-- Script --}}
@section('js')

{{-- Datatable --}}
<script>
     $(document).ready(function(){
          $('#sectorTable').DataTable({
               processing:true,
               serverside:true,
               ajax:"{{ route('ajax.get.data.sector.index') }}",
               columns:[
                    {data:'name',name:'name'},
                    {data:'code',name:'code'},
                    {data:'area',name:'area'},
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