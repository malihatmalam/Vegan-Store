{{-- Bagian Inti --}}
<div class="row justify-content-end">
     <div class="col-lg-4">
          <!-- Tanggal Ditambahkan -->
          <div class="form-group">
               <label><strong>Tanggal Penambahan :</strong></label>
               <div class="form-control">
                    @if($customer->created_at != '')
                    <b> {{  $customer->created_at->format('d-m-Y') }} </b>
                    @endif
                    @if($customer->created_at == '')
                    <b> Tanggal Belum Masih Kosong </b>
                    @endif
               </div>
          </div>
     </div>
</div>
<div class="row md-6">
     <div class="col-lg">
          {{-- Gambar Profil --}}
          <img src="{{ $customer->image != null ? asset('customers/' . $customer->image) : asset('image-not-found.jpg') }}"
               width="250px" height="250px" alt="{{ $customer->name }}"
               style="border-radius: 50%; border: 5px solid #ACABAB;" class="mx-auto d-block">
     </div>
</div>

<div class="row mt-4">
     <div class="col-lg-6">
          <!-- Nama -->
          <div class="form-group">
               <label><strong>Nama Pelanggan :</strong></label>
               <div class="form-control-plaintext">{{  $customer->name  }}</div>
          </div>

          <!-- Phone -->
          <div class="form-group">
               <label><strong>Nomor Telepon :</strong></label>
               <div class="form-control-plaintext">{{  $customer->phone  }}</div>
          </div>

     </div>
     <div class="col-lg-6">
          <!-- Email -->
          <div class="form-group">
               <label><strong>Email :</strong></label>
               <div class="form-control-plaintext">{{  $customer->email }}</div>
          </div>
     </div>
</div>
<div class="row mt-4">
     <div class="col-lg-6">
          <!-- Saldo -->
          <div class="form-group">
               <label><strong>Jumlah Saldo :</strong></label>
               <div class="form-control-plaintext">{{  $customer->balance }}</div>
          </div>
     </div>
     <div class="col-lg-6">
          <!-- Point -->
          <div class="form-group">
               <label><strong>Point :</strong></label>
               <div class="form-control-plaintext">{{  $customer->point }}</div>
          </div>
     </div>
</div>

<div class="row mt-4">
     <div class="col-lg-6">
          <!-- Sector -->
          <div class="form-group">
               <label><strong>Letak Sektor :</strong></label>
               <div class="form-control-plaintext">
                    @if($customer->sector_id != null)
                    {{  $customer->sector->name  }} ({{  $customer->sector->code  }})
                    @endif
                    @if($customer->sector_id == "")
                    Sector Belum Di isi
                    @endif
               </div>
          </div>

     </div>
     <div class="col-lg-6">
          <!-- Alamat -->
          <div class="form-group">
               <label><strong>Alamat :</strong></label>
               <div class="form-control-plaintext">{{  $customer->address }}</div>
          </div>
     </div>
</div>
{{-- </div> --}}