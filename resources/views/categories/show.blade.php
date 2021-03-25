{{-- Bagian Inti --}}
<div class="row justify-content-end">
     <div class="col-lg-4">
          <!-- Tanggal Ditambahkan -->
          <div class="form-group">
               <label><strong>Tanggal Penambahan :</strong></label>
               <div class="form-control">
                    @if($category->created_at != '')
                    <b> {{  $category->created_at->format('d-m-Y') }} </b>
                    @endif
                    @if($category->created_at == '')
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
               <label><strong>ID Kategori :</strong></label>
               <div class="form-control">{{  $category->id  }}</div>
          </div>
     </div>
</div>
<div class="row">
     <div class="col-lg-6">
          <!-- Nama -->
          <div class="form-group">
               <label><strong>Nama Kategori :</strong></label>
               <div class="form-control-plaintext">{{  $category->name  }}</div>
          </div>
          <!-- Deskripsi -->
          <div class="form-group">
               <label><strong>Deskripsi :</strong></label>
               <div class="form-control-plaintext">{{  $category->description }}</div>
          </div>
          
     </div>
     <div class="col-lg-6">
          <!-- Slug -->
          <div class="form-group">
               <label><strong>Slug Kategori :</strong></label>
               <div class="form-control-plaintext">{{  $category->slug  }}</div>
          </div>
          <!-- Gambar -->
          <div class="form-group">
               <label><strong>Gambar :</strong></label>
          </div>
          <img src="{{ $category->image != null ? asset('categories/' . $category->image) : asset('image-not-found.jpg') }}"
               width="250px" height="250px" alt="{{ $category->name }}">
          <hr>
          <b> {{  $category->image  }} </b> </td>
     </div>
</div>
