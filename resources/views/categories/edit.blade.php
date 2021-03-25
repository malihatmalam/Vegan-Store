<!-- MASTER -->
@extends('layouts.admin')

{{-- Title --}}
@section('title')
<title>Edit Kategori</title>
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
                    <a href="/category" class="breadcrumb-item"></i>Kategori</a>
                    <span class="breadcrumb-item active">Edit Kategori</span>
               </div>
          </div>
     </div>
     <!-- /Breadcrumb -->

     <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
               <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Halaman</span> - Edit
                    Kategori
               </h4>
               <a href="/" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
          </div>
     </div>
</div>
<!-- /page header -->
@endsection

@section('content')
{{-- Bagian Inti --}}
<div class="container-fluid">
     <div class="animated fadeIn">
          <div class="row">
               <div class="col-lg">
                    <div class="card">

                         {{-- Bagian Header Halaman --}}
                         <div class="card-header">
                              <h3 class="card-title">
                                   <strong>
                                        Edit Kategori
                                   </strong>
                              </h3>
                         </div>

                         {{-- Bagian Inti --}}
                         <div class="card-body">
                              <div>
                                   <form action="{{ route('category.update', $category->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div>
                                             <div class="row">
                                                  <div class="col-md-6">
                                                       {{-- Nama Produk --}}
                                                       <div class="form-group">
                                                            <label for="name">Nama Kategori</label>
                                                            <input type="text" name="name" class="form-control"
                                                                 value="{{ $category->name }}" required>
                                                            <p class="text-danger">{{ $errors->first('name') }}</p>
                                                       </div>

                                                       {{-- Deskripsi Produk --}}
                                                       <div class="form-group">
                                                            <label for="description">Deskripsi</label>
                                                            <textarea name="description" id="description"
                                                                 class="form-control">{{ $category->description }}</textarea>
                                                            <p class="text-danger">
                                                                 {{ $errors->first('description') }}</p>
                                                       </div>
                                                  </div>

                                                  <div class="col-md-6">
                                                       {{-- Gambar --}}
                                                       <!-- GAMBAR TIDAK LAGI WAJIB, JIKA DIISI MAKA GAMBAR AKAN DIGANTI, JIKA DIBIARKAN KOSONG MAKA GAMBAR TIDAK AKAN DIUPDATE -->
                                                       <div class="form-group">
                                                            <label for="image">Foto Kategori</label>
                                                            <br>
                                                            <!--  TAMPILKAN GAMBAR SAAT INI -->
                                                            <img src="{{ $category->image != null ? asset('categories/' . $category->image) : asset('image-not-found.jpg') }}"
                                                                 width="250px" height="250px"
                                                                 alt="{{ $category->name }}">
                                                            <hr>
                                                            <input type="file" name="image" class="form-control-uniform-custom">
                                                            <p><strong>Biarkan kosong jika tidak ingin mengganti
                                                                      gambar</strong></p>
                                                            <p class="text-danger">{{ $errors->first('image') }}
                                                            </p>
                                                       </div>
                                                  </div>

                                             </div>
                                             <div class="row justify-content-end mt-3">
                                                  
                                                  <div class="col-md-3">
                                                       {{-- Update (Submit) --}}
                                                       <div class="form-group row">
                                                            <div class="col-md">
                                                                 <a href="/category" class="btn btn-warning">
                                                                      Kembali </a>
                                                            </div>
                                                            <div class="col-md">
                                                                 <button type="submit" class="btn btn-primary">
                                                                      Simpan </button>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection

{{-- Script --}}
@section('js')
<script src="{{ asset('global_assets/js/plugins/forms/tags/tagsinput.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/tags/tokenfield.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/inputs/maxlength.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/inputs/formatter.min.js') }}"></script>
<script src="{{ asset('global_assets/js/demo_pages/form_inputs.js') }}"></script>
@endsection