<!-- MEMANGGIL MASTER TEMPLATE YANG SUDAH DIBUAT SEBELUMNYA, YAKNI admin.blade.php -->
@extends('layouts.admin')

{{-- Mengubah Title menjadi List Product --}}
@section('title')
<title>Edit Kurir</title>
@endsection

@section('header')
<!-- Page header -->
<div class="page-header">
     <!-- Breadcrumb -->
     <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
               <div class="breadcrumb">
                    <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Halaman</a>
                    <a href="/courir" class="breadcrumb-item">Kurir</a>
                    <span class="breadcrumb-item active">Edit Kurir</span>
               </div>
          </div>
     </div>
     <!-- /Breadcrumb -->

     <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
               <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Halaman</span> - Edit
                    Kurir</h4>
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
               <div class="col-md-12">
                    <div class="card">
                         <div class="card-header">
                              <h3 class="card-title">
                                   <strong>
                                        Edit Kurir
                                   </strong>
                              </h3>
                         </div>

                         {{-- Bagian Body Halaman --}}
                         <div class="card-body">

                              {{-- Bagian Inti --}}
                              <div>
                                   <!-- PASTIKAN MENGIRIMKAN ID PADA ROUTE YANG DIGUNAKAN -->
                                   <form action="{{ route('courir.update', $courir->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <!-- KARENA UPDATE MAKA KITA GUNAKAN DIRECTIVE DIBAWAH INI -->
                                        @method('PUT')


                                        <!-- FORM INI SAMA DENGAN CREATE, YANG BERBEDA HANYA ADA TAMBAHKAN VALUE UNTUK MASING-MASING INPUTAN  -->

                                        <div class="row">

                                             <div class="col-md-6">
                                                  {{-- Nama --}}
                                                  <div class="form-group">
                                                       <label for="name">Nama Kurir</label>
                                                       <input type="text" name="name" class="form-control"
                                                            value="{{ $courir->name }}" required>
                                                       <p class="text-danger">{{ $errors->first('name') }}</p>
                                                  </div>
                                             </div>

                                             <div class="col-md-6">
                                                  {{-- Status --}}
                                                  <div class="form-group">
                                                       <label for="status">Status</label>
                                                       <select name="status" class="form-control" required>
                                                            <option value="active"
                                                                 {{ $courir->status == 'active' ? 'selected':'' }}>
                                                                 Aktiv</option>
                                                            <option value="non-active"
                                                                 {{ $courir->status == 'non-active' ? 'selected':'' }}>
                                                                 Tidak Aktiv</option>
                                                       </select>
                                                       <p class="text-danger">{{ $errors->first('status') }}</p>
                                                  </div>
                                             </div>

                                             <div class="col-md-6">
                                                  {{-- Sector --}}
                                                  <div class="form-group">
                                                       <label for="">Sector</label>
                                                       <select class="form-control" name="sector_id" required>
                                                            <option value="">Pilih Sector</option>
                                                            @foreach ($sector as $row)
                                                            <option value="{{ $row->id }}"
                                                                 {{ $courir->sector_id == $row->id ? 'selected':'' }}>
                                                                 {{ $row->name }}</option>
                                                            @endforeach
                                                       </select>
                                                       <p class="text-danger">{{ $errors->first('sector_id') }}</p>
                                                  </div>
                                             </div>
                                        </div>

                                        {{-- Update (Submit) --}}
                                        <div class="row justify-content-end mt-3">
                                             <div class="col-md-3">
                                                  <div class="form-group row">
                                                       <div class="col-md">
                                                            <a href="/courir" class="btn btn-warning">
                                                                 Kembali </a>
                                                       </div>
                                                       <div class="col-md">
                                                            <button type="submit" class="btn btn-primary">
                                                                 Simpan </button>
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