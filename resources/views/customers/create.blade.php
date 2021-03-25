<!-- MASTER -->
@extends('layouts.admin')

{{-- Title --}}
@section('title')
    <title>Tambah Customer Admin</title>
@endsection
{{-- END Title --}}

@section('content')
<main class="main">

     {{-- Breadcrumb, Home > Admin > Create Customer  --}}
     <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Admin</li>
          <li class="breadcrumb-item active">Create Customer</li> 
     </ol>
     {{-- END Breadcrumb, Home > Admin > Create Customer  --}}

     {{-- Bagian Inti dari Halaman --}}
     <div class="container-fluid">
          <div class="animated fadeIn">
               
               <!-- TAMBAHKAN ENCTYPE="" KETIKA MENGIRIMKAN FILE PADA FORM -->
               <form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                         <div class="col-md-12">

                              {{-- Card 1 : Nama, Email dan Sector --}}
                              <div class="card">

                                   {{-- Bagian Header dari Halaman --}}
                                   <div class="card-header">
                                        <h4 class="card-title">Tambah Customer</h4>
                                   </div>

                                   {{-- Bagian Inti dari Halaman --}}
                                   <div class="card-body">
                                        
                                        {{-- Nama --}}
                                        <div class="form-group">
                                             <label for="name">Nama Customer</label>
                                             <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                             <p class="text-danger">{{ $errors->first('name') }}</p>
                                        </div>

                                        {{-- Email --}}
                                        <div class="form-group">
                                             <label for="name">Email Customer</label>
                                             <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
                                             <p class="text-danger">{{ $errors->first('email') }}</p>
                                        </div>
                                        
                                        {{-- Sector --}}
                                        <div class="form-group">
                                             
                                             <label for="sector_id">Sektor</label>
                                             
                                             <!-- DATA KATEGORI DIGUNAKAN DISINI, SEHINGGA SETIAP PRODUK USER BISA MEMILIH KATEGORINYA -->
                                             <select name="sector_id" class="form-control">
                                                  <option value="">Pilih Sektor</option>
                                                  @foreach ($sector as $row)
                                                  <option value="{{ $row->id }}" {{ old('sector_id') == $row->id ? 'selected':'' }}>{{ $row->name }} ({{ $row->code }})</option>
                                                  @endforeach
                                             </select>

                                             <p class="text-danger">{{ $errors->first('sector_id') }}</p>
                                        </div>

                                        {{-- Submit --}}
                                        <div class="form-group">
                                             <button class="btn btn-primary btn-sm">Tambah</button>
                                        </div>

                                   </div>

                              </div>

                         </div>

                    </div>
               </form>

          </div>
     </div>
</main>
@endsection

<!-- PADA ADMIN LAYOUTS, TERDAPAT YIELD JS YANG BERARTI KITA BISA MEMBUAT SECTION JS UNTUK MENAMBAHKAN SCRIPT JS JIKA DIPERLUKAN -->
@section('js')
@endsection
