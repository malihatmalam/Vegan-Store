{{-- Bagian Inti --}}
{{-- Date --}}
<div class="row justify-content-end">
     <div class="col-lg-4">
          <!-- Tanggal Ditambahkan -->
          <div class="form-group">
               <label><strong>Tanggal Pembuatan :</strong></label>
               <div class="form-control">
                    @if($order->created_at != '')
                    <b> {{  $order->created_at->format('d-m-Y') }} </b>
                    @endif
                    @if($order->created_at == '')
                    <b> Tanggal Belum Masih Kosong </b>
                    @endif
               </div>
          </div>
     </div>
</div>
{{-- General --}}
<div class="row mt-4">
     <div class="col-lg-6">
          <!-- Invoice -->
          <div class="form-group">
               <label><h4><strong>Nomor Invoice :</strong></h4></label>
               <div class="form-control-plaintext"><h6>{{  $order->invoice  }}</h6></div>
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
                              @if($order->status == "Success")
                              <div class="badge bg-success"><h5> Sukses </h5></div>
                              @endif
                              @if($order->status == "Wait")
                              <div class="badge bg-warning"><h5> Menunggu </h5></div>
                              @endif
                              @if($order->status == "Delivery")
                              <div class="badge bg-primary"><h5> Sedang Dikirim </h5></div>
                              @endif                              
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
{{-- Customer Information --}}
<div>
     <div class="row mt-4">
          <div class="col-lg-12">
               <h4><strong> Informasi Pelanggan </strong></h4>
          </div>
     </div>
     <div class="row mt-3">
          <div class="col-lg-6">
               <!-- Name Customer -->
               <div class="form-group">
                    <label><strong>Nama Pelanggan :</strong></label>
                    <div class="form-control-plaintext">{{  $order->customer_name }}</div>
               </div>
          </div>
          <div class="col-lg-6">
               <!-- Number Phone -->
               <div class="form-group">
                    <label><strong>Nomor Telepon :</strong></label>
                    <div class="form-control-plaintext">+62{{  $order->customer_phone }}</div>
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
               <!-- Scheduled  -->
               <div class="form-group">
                    <label><strong>Jenis Pesanan :</strong></label>
                    <div class="form-control-plaintext">
                         @if($order->scheduled == true)
                              Berlangganan (Pesanan Yang Berlangganan)
                         @endif
                         @if($order->scheduled == false)
                              Sekali Beli
                         @endif
                    </div>
               </div>
          </div>
          <div class="col-lg-6">
               <!-- Use Plastic  -->
               <div class="form-group">
                    <label><strong>Pesanan Menggunakan Plastik :</strong></label>
                    <div class="form-control-plaintext">
                         @if($order->useplastic == true)
                              <Strong>IYA</Strong> (Menggunakan Plastik)
                         @endif
                         @if($order->useplastic == false)
                              <strong>TIDAK</strong>
                         @endif
                    </div>
               </div>
          </div>
          <div class="col-lg-6">
               <!-- Paymethode -->
               <div class="form-group">
                    <label><strong>Metode Pembayaran :</strong></label>
                    <div class="form-control-plaintext">
                         @if($order->paymethod == "CASH")
                              <strong>Cash</strong> (Bayar Langsung)
                         @endif
                         @if($order->paymethod == "DEBT")
                              Memotong Saldo
                         @endif
                    </div>
               </div>
          </div>
          <div class="col-lg-12">
               <!-- Note -->
               <div class="form-group">
                    <label><strong>Catatan :</strong></label>
                    <div class="form-control-plaintext">
                         {{ $order->note }}
                    </div>
               </div>
          </div>
     </div>
     <div class="row mt-2">
          <div class="col-lg-12">
               <div class="form-grup">
                    <label><strong>Daftar Pesanan :</strong></label>
                    <div class="table-responsive">
                         <table class="table table-hover table-bordered" id="sectorTable">
                              <thead>
                                   <tr>
                                        <th> Nama </th>
                                        <th> Harga </th>
                                        <th> Item </th>
                                        <th> Total </th>
                                   </tr>
                              </thead>
                              <tbody>
                                   @forelse ($order->orderDetail as $row)
                                   <tr>
                                        <td>
                                             @if ($row->product_name != null)
                                                  {{ $row->product_name }}     
                                             @endif
                                             @if ($row->product_name == null)
                                                  {{ $row->product->name }}     
                                             @endif
                                        </td>
                                        <td>
                                             Rp {{ number_format($row->price,2,',','.') }}
                                        </td>
                                        <td>
                                             {{ $row->qty }}
                                        </td>
                                        <td>
                                             Rp {{ number_format($row->total,2,',','.')  }}
                                        </td>
                                   </tr>
                                   @empty
                                   <tr>
                                        <td colspan="6" class="text-center">Tidak ada data</td>
                                   </tr>
                                   @endforelse
                    
                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
     </div>
     <div class="row mt-3 justify-content-end">
          <div class="col-lg-6">
               {{-- Sub total --}}
               <div class="form-grup">
                    <div class="row">
                         <div class="col-md-6">
                              <label>
                                   <h6>
                                        <strong>Subtotal :</strong>
                                   </h6>
                              </label>
                         </div>
                         <div class="col-md-6">                              
                              <h6>
                                   Rp {{ number_format($order->subtotal,2,',','.') }}     
                              </h6>
                         </div>
                    </div>
               </div>

               {{-- Ongkos --}}
               <div class="form-grup">
                    <div class="row">
                         <div class="col-md-6">
                              <label>
                                   <h6>
                                        <strong>Ongkos :</strong>
                                   </h6>
                              </label>
                         </div>
                         <div class="col-md-6">                              
                              <h6>
                                   Rp {{ number_format($order->delivery_price,2,',','.') }}     
                              </h6>
                         </div>
                    </div>
               </div>
               {{-- Total --}}
               <div class="form-grup">
                    <div class="row">
                         <div class="col-md-6">
                              <label>
                                   <h5>
                                        <strong>Total :</strong>
                                   </h5>
                              </label>
                         </div>
                         <div class="col-md-6">                              
                              <h5>
                                   Rp {{ number_format($order->total,2,',','.') }}     
                              </h5>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
{{-- Delivery Information --}}
<div>
     <div class="row mt-4">
          <div class="col-lg-12">
               <h4><strong> Informasi Pengiriman </strong></h4>
          </div>
     </div>
     <div class="row mt-3">
          <div class="col-lg">
               <!-- Address -->
               <div class="form-group">
                    <label><strong>Alamat Pengiriman :</strong></label>
                    <div class="form-control-plaintext">{{  $order->address }}</div>
               </div>
          </div>
     </div>
     <div class="row mt-2">
          <div class="col-lg-6">
               <!-- Sector Detail -->
               <div class="form-group">
                    <label><strong>Area Pengiriman :</strong></label>
                    <div class="form-control-plaintext">{{  $order->detailSector_name }}</div>
               </div>
          </div>
          <div class="col-lg-6">
               <!-- Sector  -->
               <div class="form-group">
                    <label><strong>Sektor Pengiriman :</strong></label>
                    <div class="form-control-plaintext">
                         @if($order->sector_id != null)
                         {{  $order->sector->name  }} ({{  $order->sector->code  }})
                         @endif
                         @if($order->sector_id == "")
                         Sector Belum Di isi
                         @endif
                    </div>
               </div>
          </div>
     </div>
     <div class="row mt-2">
          <!-- Delivery -->
          <div class="col-lg-6">
               <!-- Delivery Date -->
               <div class="form-group">
                    <label><strong>Tanggal Pengiriman :</strong></label>
                    <div class="form-control-plaintext">{{  $order->delivery_date }}</div>
               </div>
          </div>
          <div class="col-lg-6">
               <!-- Delivery Time  -->
               <div class="form-group">
                    <label><strong>Waktu Pengiriman :</strong></label>
                    <div class="form-control-plaintext">{{  $order->delivery_time }}</div>
               </div>
          </div>
     </div>
</div>

{{-- </div> --}}