<!-- MASTER -->
@extends('layouts.admin')

{{-- Title --}}
@section('title')
    <title>Edit Area (SeKtor Detail)</title>
@endsection
{{-- END Title --}}


@section('content')
<main class="main">

     {{-- Breadcrumb, Home > Sektor > Area  --}}
     <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Sektor</li>
          <li class="breadcrumb-item active">Area (Detail Sektor)</li>
     </ol>
     {{-- END Breadcrumb, Home > Sektor > Area --}}

     {{-- Bagian Inti --}}
     <div class="container-fluid">
          <div class="animated fadeIn">
               <div class="row">
                    <div class="col-md-12">
                         <div class="card">

                              {{-- Bagian Header Halaman --}}
                              <div class="card-header">
                                   <h4 class="card-title">
                                        Edit Area
                                   </h4>
                              </div>
                              {{-- END Header --}}

                              {{-- Bagian Body --}}
                              <div class="card-body">

                                   {{-- Edit Area --}}
                                   
                                        <form action="{{ route('sectorDetail.update', $sector_detail->id) }}" method="post" enctype="multipart/form-data" >
                                             @csrf
                                             @method('PUT')
                                             <div class="row">               
                                                  {{-- Nama Area --}}
                                                  <div class="col-xs-12 col-sm-12 col-md-12">     
                                                       <label for="">Nama Area</label>
                                                       <h2> 
                                                            <b> {{ $sector_detail->name }} </b> 
                                                       </h2>
                                                  </div>
                                                  {{-- END Area --}}
                              
                                                  {{-- Nama Produk --}}
                                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                                       <label for="">Sector</label>
                                                       <select class="form-control" name="sector_id" required>
                                                            <option value="">Pilih Sektor</option>
                                                            @foreach ($sector as $row)
                                                                 <option value="{{ $row->id }}" {{ $sector_detail->sector_id == $row->id ? 'selected':'' }} >{{ $row->name }} ( {{ $row->code }} )</option>
                                                            @endforeach
                                                       </select>
                                                       <p class="text-danger">{{ $errors->first('sector_id') }}</p>
                                                  </div>
                                                  {{-- END Produk --}}
                              
                                                  {{-- Button Submit --}}
                                                  <div class="col-xs-12 col-sm-12 col-md-12" >
                                                       <div class="form-group row">
                                                            <div class="col-sm-9">
                                                                 <a href="/sector" class="btn btn-warning" > Kembali </a>
                                                                 <button type="submit" class="btn btn-primary"> Simpan </button>
                                                            </div>
                                                       </div> 
                                                  </div>
                                                  {{-- END Button Submit --}}             
                                             </div>
                                        </form>

                              </div>
                              {{-- END Body --}}

                         </div>
                    </div>
               </div>
          </div>
     </div>
     {{-- END Bagian Inti --}}

</main>
@endsection

{{-- Script --}}
@section('js')

