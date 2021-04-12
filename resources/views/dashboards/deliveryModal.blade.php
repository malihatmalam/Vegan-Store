<div class="container">
     
     <h3 class="mt-1"><strong>Apakah Pesanan Ini Sudah Dikirim ?</strong></h3>

     <div class="row mt-4">
          <div class="col-lg-6">
               <!-- Delivery Code -->
               <div class="form-group">
                    <label>
                         <h5><strong>Delivery Code :</strong></h5>
                    </label>
                    <div class="form-control-plaintext">
                         <h6>{{  $delivery->delivery_code  }}</h6>
                    </div>
               </div>

          </div>
          <div class="col-lg-6">
               <!-- Invoice -->
               <div class="form-group">
                    <label>
                         <h5><strong>Nomor Invoice :</strong></h5>
                    </label>
                    <div class="form-control-plaintext">
                         <h6>{{  $delivery->invoice  }}</h6>
                    </div>
               </div>

          </div>
     </div>

     
     <form action="{{ route('delivery.success', $delivery->id) }}" method="post">
          @csrf
          <div class="mt-4">
               <a href="/" class="btn btn-warning" > Kembali </a>
               <button class="btn btn-success">Sudah</button>
          </div>
     </form>

</div>