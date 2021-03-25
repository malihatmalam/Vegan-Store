{{-- Bagian Inti --}}
<div class="row justify-content-end">
     <div class="col-lg-4">
          <!-- Tanggal Ditambahkan -->
          <div class="form-group">
               <label><strong>Tanggal Penambahan :</strong></label>
               <div class="form-control">
                    @if($product->created_at != '')
                    <b> {{  $product->created_at->format('d-m-Y') }} </b>
                    @endif
                    @if($product->created_at == '')
                    <b> Tanggal Belum Masih Kosong </b>
                    @endif
               </div>
          </div>
     </div>
</div>
<div class="row">
     <div class="col-lg-4">
          <!-- ID -->
          <div class="form-group">
               <label><strong>ID Produk :</strong></label>
               <div class="form-control">{{  $product->id  }}</div>
          </div>
     </div>
</div>
<div class="row">
     <div class="col-lg-6">
          <!-- Nama -->
          <div class="form-group">
               <label><strong>Nama Produk :</strong></label>
               <div class="form-control-plaintext">{{  $product->name  }}</div>
          </div>
          <!-- Slug -->
          <div class="form-group">
               <label><strong>Slug Produk :</strong></label>
               <div class="form-control-plaintext">{{  $product->slug  }}</div>
          </div>
          <!-- Status -->
          <div class="form-group">
               <label><strong>Status Produk :</strong></label>
               <div class="form-control-plaintext">
                    {!! $product->status_label !!}
               </div>
          </div>
     </div>
     <div class="col-lg-6">
          <!-- Kategori -->
          <div class="form-group">
               <label><strong>Kategori Produk :</strong></label>
               <div class="form-control-plaintext">{{  $product->category->name  }}</div>
          </div>
          <!-- Harga -->
          <div class="form-group">
               <label><strong>Harga Produk :</strong></label>
               <div class="form-control-plaintext">{{ "Rp ".number_format($product->price,2,',','.') }}</div>
          </div>
          <!-- Tipe Unit -->
          <div class="form-group">
               <label><strong>Satuan Produk (Tipe Unit) :</strong></label>
               <div class="form-control-plaintext">{{  $product->typeunit  }}</div>
          </div>
     </div>
</div>
<div class="row">
     <div class="col-lg">
          <!-- Deskripsi -->
          <div class="form-group">
               <label><strong>Deskripsi :</strong></label>
               <div class="form-control-plaintext">{{  $product->description }}</div>
          </div>
     </div>
</div>
<div class="row">
     <div class="col-lg">
          <!-- Gambar -->
          <div class="form-group">
               <label><strong>Gambar :</strong></label>
          </div>
          <img src="{{ asset('products/' . $product->image) }}" width="250px" height="250px" alt="{{ $product->name }}">
          <hr>
          <b> {{  $product->image  }} </b> </td>
     </div>
</div>

