<!-- MASTER -->
@extends('layouts.admin')
<!-- /MASTER -->

<!-- Title -->
@section('title')
<title>Tambah Produk</title>
@endsection
<!-- END Title -->

@section('header')
<!-- Page header -->
<div class="page-header">
     <!-- Breadcrumb -->
     <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
               <div class="breadcrumb">
                    <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Halaman</a>
                    <a href="/product" class="breadcrumb-item">Produk</a>
                    <span class="breadcrumb-item active">Tambah Produk</span>
               </div>
          </div>
     </div>
     <!-- /Breadcrumb -->

     <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
               <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Halaman</span> - Tambah
                    Produk</h4>
               <a href="/" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
          </div>
     </div>
</div>
<!-- /page header -->
@endsection

@section('content')

<!-- Bagian Inti dari Halaman -->
<div class="container-fluid">
     <div class="animated fadeIn">
          <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="row">
                    <div class="col-lg">
                         <div class="card">
                              <!-- Bagian Header dari Halaman -->
                              <div class="card-header">
                                   <h3 class="card-title"><strong>Tambah Produk</strong></h3>
                              </div>
                              <!-- END Header -->

                              <!-- Bagian Body dari Halaman -->
                              <div class="card-body">

                                   <div class="row">
                                        <div class="col-md-6">
                                             <!-- Nama -->
                                             <div class="form-group">
                                                  <label for="name">Nama Produk</label>
                                                  <input type="text" name="name" class="form-control"
                                                       value="{{ old('name') }}" required>
                                                  <p class="text-danger">{{ $errors->first('name') }}</p>
                                             </div>

                                             <!-- Deskripsi -->
                                             <div class="form-group">
                                                  <label for="description">Deskripsi</label>

                                                  <!-- TAMBAHKAN ID YANG NANTINYA DIGUNAKAN UTK MENGHUBUNGKAN DENGAN CKEDITOR -->
                                                  <textarea name="description" id="description"
                                                       class="form-control">{{ old('description') }}</textarea>
                                                  <p class="text-danger">{{ $errors->first('description') }}</p>
                                             </div>

                                             <!-- Harga + Type Unit-->
                                             <div class="row">
                                                  <div class="col-md">

                                                       <!-- Harga -->
                                                       <div class="form-group">
                                                            <label for="price">Harga</label>
                                                            <input type="number" name="price" class="form-control"
                                                                 value="{{ old('price') }}" required>
                                                            <p class="text-danger">{{ $errors->first('price') }}</p>
                                                       </div>

                                                  </div>
                                                  <div class="col-md">

                                                       <!-- Type Unit -->
                                                       <div class="form-group">
                                                            <label for="weight">Satuan / Ukuran</label>
                                                            <input type="text" name="typeunit" class="form-control"
                                                                 value="{{ old('typeunit') }}" required>
                                                            <p class="text-danger">{{ $errors->first('typeunit') }}</p>
                                                       </div>

                                                  </div>
                                             </div>

                                             <!-- Foto Produk -->
                                             <div class="form-group">
                                                  <label for="image">Foto Produk</label>
                                                  <input type="file" name="image" class="form-control-uniform-custom"
                                                       value="{{ old('image') }}" required>
                                                  <p class="text-danger">{{ $errors->first('image') }}</p>
                                             </div>

                                        </div>

                                        <div class="col-md-4">
                                             <!-- Status -->
                                             <div class="form-group">
                                                  <label for="status">Status</label>
                                                  <select name="status" class="form-control" required>
                                                       <option value="publish"
                                                            {{ old('status') == 'publish' ? 'selected':'' }}>
                                                            Publish</option>
                                                       <option value="draft"
                                                            {{ old('status') == 'draft' ? 'selected':'' }}>Draft
                                                       </option>
                                                  </select>
                                                  <p class="text-danger">{{ $errors->first('status') }}</p>
                                             </div>

                                             <!-- Kategori -->
                                             <div class="form-group">

                                                  <label for="category_id">Kategori</label>

                                                  <!-- DATA KATEGORI DIGUNAKAN DISINI, SEHINGGA SETIAP PRODUK USER BISA MEMILIH KATEGORINYA -->
                                                  <select name="category_id" class="form-control">
                                                       <option value="">Pilih</option>
                                                       @foreach ($category as $row)
                                                       <option value="{{ $row->id }}"
                                                            {{ old('category_id') == $row->id ? 'selected':'' }}>
                                                            {{ $row->name }}
                                                       </option>
                                                       @endforeach
                                                  </select>

                                                  <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                             </div>

                                        </div>

                                   </div>
                                   <div class="row justify-content-end">
                                        <div class="col-md-2">
                                             <!-- Submit -->
                                             <div class="form-group">
                                                  <button class="btn btn-primary bg-primary">Tambah</button>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <!-- END Body -->
                         </div>
                    </div>
               </div>
          </form>
     </div>
</div>
<!-- END Bagian Inti dari Halaman -->

@endsection


@section('js')

<script src="{{ asset('global_assets/js/plugins/forms/tags/tagsinput.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/tags/tokenfield.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/inputs/maxlength.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/inputs/formatter.min.js') }}"></script>

<script src="{{ asset('global_assets/js/demo_pages/form_inputs.js') }}"></script>

<!-- CKEDITOR -->
<!-- <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
     //TERAPKAN CKEDITOR PADA TEXTAREA DENGAN ID DESCRIPTION
     CKEDITOR.replace('description');
</script> -->
<!-- END CKEDITOR -->
@endsection