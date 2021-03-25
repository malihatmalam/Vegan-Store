{{-- Bagian Inti --}}
<div class="row justify-content-end">
     <div class="col-lg-4">
          <!-- Tanggal Ditambahkan -->
          <div class="form-group">
               <label><strong>Tanggal Penambahan :</strong></label>
               <div class="form-control">
                    @if($courir->created_at != '')
                    <b> {{  $courir->created_at->format('d-m-Y') }} </b>
                    @endif
                    @if($courir->created_at == '')
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
               <label><strong>ID Kurir :</strong></label>
               <div class="form-control">{{  $courir->id  }}</div>
          </div>
     </div>
</div>
<div class="row">
     <div class="col-lg-6">
          <!-- Nama -->
          <div class="form-group">
               <label><strong>Nama Kurir :</strong></label>
               <div class="form-control-plaintext">{{  $courir->name  }}</div>
          </div>          
     </div>
     <div class="col-lg-6">
          <!-- Sector -->
          <div class="form-group">
               <label><strong>Sektor :</strong></label>
               <div class="form-control-plaintext">{{  $courir->sector->code }}</div>
          </div>
     </div>
</div>
