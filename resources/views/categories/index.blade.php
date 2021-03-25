<!-- MASTER -->
@extends('layouts.admin')

{{-- Title --}}
@section('title')
<title>List Kategori</title>
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
                    <span class="breadcrumb-item active">Kategori</span>
               </div>
          </div>
     </div>
     <!-- /Breadcrumb -->

     <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
               <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Halaman</span> - Kategori
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
          <div class="row">

               {{-- List Kategori --}}
               <div class="col-md-8">
                    <div class="card">
                         {{-- Bagian Header Halaman --}}
                         <div class="card-header">
                              <h4 class="card-title">
                                   List Kategori
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

                              <!-- TABLE -->
                              <div class="table-responsive">
                                   <table class="table table-hover table-bordered" id="categoryTable">
                                        <thead>
                                             <tr>
                                                  <th> Name </th>
                                                  <th> Deskripsi </th>
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

                    </div>
               </div>
               {{-- END List Kategori --}}

               {{-- Tambah Kategori --}}
               <div class="col-md-4">
                    <div class="card">
                         {{-- Header --}}
                         <div class="card-header">
                              <h4 class="card-title">
                                   Tambah Kategori
                              </h4>
                         </div>
                         {{-- END Header --}}
                         {{-- Body --}}
                         <div class="card-body">
                              <form action="{{ route('category.store') }}" method="post"
                                   enctype="multipart/form-data">
                                   @csrf

                                   {{-- Nama --}}
                                   <div class="form-group">
                                        <label for="name">Nama Kategori</label>
                                        <input type="text" name="name" class="form-control"
                                             value="{{ old('name') }}" required>
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                   </div>

                                   {{-- Deskripsi --}}
                                   <div class="form-group">
                                        <label for="description">Deskripsi</label>

                                        <!-- TAMBAHKAN ID YANG NANTINYA DIGUNAKAN UTK MENGHUBUNGKAN DENGAN CKEDITOR -->
                                        <textarea name="description" id="description"
                                             class="form-control">{{ old('description') }}</textarea>
                                        <p class="text-danger">{{ $errors->first('description') }}</p>
                                   </div>

                                   {{-- Image --}}
                                   <div class="form-group">
                                        <label for="image">Foto Kategori</label>
                                        <input type="file" name="image" class="form-control-uniform-custom"
                                             value="{{ old('image') }}" required>
                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                   </div>

                                   <div class="form-group">
                                        <button class="btn btn-primary btn-sm float-right">Tambah</button>
                                   </div>
                              </form>
                         </div>
                         {{-- END Body --}}
                    </div>
               </div>
               {{-- END Tambah Kategori --}}

          </div>
     </div>
     </div>

     @include('categories.modal')


</main>
@endsection

{{-- Script --}}
@section('js')
<script src="{{ asset('global_assets/js/plugins/forms/tags/tagsinput.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/tags/tokenfield.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/inputs/maxlength.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/inputs/formatter.min.js') }}"></script>
<script src="{{ asset('global_assets/js/demo_pages/table_responsive.js')}}"></script>
<script src="{{ asset('global_assets/js/demo_pages/extra_sweetalert.js')}}"></script>

<script src="{{ asset('global_assets/js/demo_pages/form_inputs.js') }}"></script>

{{-- Datatable --}}
<script>
     $(document).ready(function(){
          $('#categoryTable').DataTable({
               processing:true,
               serverside:true,
               ajax:"{{ route('ajax.get.data.category.index') }}",
               columns:[
                    {data:'name',name:'name'},
                    {data:'description',name:'description'},
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