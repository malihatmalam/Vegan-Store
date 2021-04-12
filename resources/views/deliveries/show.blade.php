{{-- Bagian Inti --}}
{{-- Date --}}
<div class="row justify-content-end">
     <div class="col-lg-4">
          <!-- Tanggal Ditambahkan -->
          <div class="form-group">
               <label><strong>Tanggal Pembuatan :</strong></label>
               <div class="form-control">
                    @if($delivery->created_at != '')
                    <b> {{  $delivery->created_at->format('d-m-Y') }} </b>
                    @endif
                    @if($delivery->created_at == '')
                    <b> Tanggal Belum Masih Kosong </b>
                    @endif
               </div>
          </div>
     </div>
</div>
{{-- General --}}
<div class="row mt-4">
     <div class="col-lg-6">
          <!-- Delivery Code -->
          <div class="form-group">
               <label><h4><strong>Delivery Code :</strong></h4></label>
               <div class="form-control-plaintext"><h6>{{  $delivery->delivery_code  }}</h6></div>
          </div>
     </div>
     <div class="col-lg-6">
          <!-- Invoice -->
          <div class="form-group">
               <label><h4><strong>Nomor Invoice :</strong></h4></label>
               <div class="form-control-plaintext"><h6>{{  $delivery->invoice  }}</h6></div>
          </div>
     </div>
     <div class="col-lg-6">
          <!-- Status -->
          <div class="form-group">
               <div class="row">
                    <div class="col-md-4">
                         <label><h4><strong>Status :</h4></strong></label>
                    </div>
                    <div class="col-md-8">
                         <div class="form-control-plaintext">
                              @if($delivery->status == "Success")
                              <div class="badge bg-success"><h5> Sukses </h5></div>
                              @endif
                              @if($delivery->status == "Delivery")
                              <div class="badge bg-primary"><h5> Sedang Dikirim </h5></div>
                              @endif                              
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
{{-- Order Information --}}
<div>
     <div class="row mt-4">
          <div class="col-lg-12">
               <h4><strong> Informasi Pesanan </strong></h4>
          </div>
     </div>
     <div class="row mt-3">
          <div class="col-lg-6">
               <!-- Name Customer -->
               <div class="form-group">
                    <label><strong>Nama Pelanggan :</strong></label>
                    <div class="form-control-plaintext">{{  $delivery->order->customer_name }}</div>
               </div>
          </div>
          <div class="col-lg-6">
               <!-- Number Phone -->
               <div class="form-group">
                    <label><strong>Nomor Telepon :</strong></label>
                    <div class="form-control-plaintext">+62{{  $delivery->order->customer_phone }}</div>
               </div>
          </div>
          <div class="col-lg-12">
               <!-- Address -->
               <div class="form-group">
                    <label><strong>Alamat Tujuan :</strong></label>
                    <div class="form-control-plaintext">+62{{  $delivery->order->address }}</div>
               </div>
          </div>
          <div class="col-lg-6">
               <!-- Sector Detail -->
               <div class="form-group">
                    <label><strong>Area Tujuan :</strong></label>
                    <div class="form-control-plaintext">{{  $delivery->order->detailSector_name }}</div>
               </div>
          </div>
          <div class="col-lg-6">
               <!-- Sector -->
               <div class="form-group">
                    <label><strong>Sector Tujuan :</strong></label>
                    <div class="form-control-plaintext">{{  $delivery->order->sector->name }}</div>
               </div>
          </div>
     </div>
</div>
{{-- Pengiriman Information --}}
<div>
     <div class="row mt-4">
          <div class="col-lg-12">
               <h4><strong> Informasi Kurir </strong></h4>
          </div>
     </div>
     <div class="row mt-3">
          <div class="col-lg-6">
               <!-- Kurir -->
               <div class="form-group">
                    <label><strong>Nama Kurir :</strong></label>
                    <div class="form-control-plaintext">{{  $delivery->courir->name }} ({{ $delivery->courir->sector->code }})</div>
               </div>
          </div>
          <div class="col-lg-12">
               <!-- Note -->
               <div class="form-group">
                    <label><strong>Catatan :</strong></label>
                    <div class="form-control-plaintext">
                         {{ $delivery->note }}
                    </div>
               </div>
          </div>
     </div>
</div>


{{-- </div> --}}