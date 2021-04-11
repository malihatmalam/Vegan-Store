{{-- Bagian Inti --}}
<div>
     <form action="{{ route('order.update', $order->id) }}" method="post" enctype="multipart/form-data">
          @csrf

          @method('PUT')

          <div>
               <div class="row">

                    <div class="col-lg-12 mt-3">
                         <label for="status">Status</label>
                         <select name="status" class="form-control" required>
                              <option value="Success" {{ $order->status == 'Success' ? 'selected':'' }}>Berhasil</option>
                              <option value="Wait" {{ $order->status == 'Wait' ? 'selected':'' }}>Menunggu</option>
                              <option value="Delivery" {{ $order->status == 'Delivery' ? 'selected':'' }}>Sedang Dikirim</option>
                         </select>
                         <p class="text-danger">{{ $errors->first('status') }}</p>
                    </div>

                    {{-- Note --}}
                    <div class="col-lg-12 mt-3">
                         <div class="form-group">
                              <label for="name"><strong>Silahkan Berikan Catatan Pada Pesanan Ini :</strong></label>
                              <input type="text" name="name" class="form-control" value="{{ $order->note }}">
                         </div>
                    </div>


                    {{-- Update (Submit) --}}
                    <div class="col-lg-12 mt-3">
                         <div class="form-group row">
                              <div class="col-sm-9">
                                   <a href="/order" class="btn btn-warning"> Kembali </a>
                                   <button type="submit" class="btn btn-primary"> Simpan </button>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </form>
</div>
{{-- END Bagian Inti --}}