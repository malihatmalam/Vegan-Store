
{{-- Bagian Inti --}}
<div>
     <form action="{{ route('delivery.update', $delivery->id) }}" method="post" enctype="multipart/form-data">
          @csrf

          @method('PUT')

          <div>
               <div class="row">
                    
                    {{-- Status --}}
                    <div class="col-lg-12 mt-3">
                         <label for="status">Status</label>
                         <select name="status" class="form-control form-control-select2" required>
                              <option value="Success" {{ $delivery->status == 'Success' ? 'selected':'' }}>Berhasil</option>
                              <option value="Delivery" {{ $delivery->status == 'Delivery' ? 'selected':'' }}>Sedang Dikirim</option>
                         </select>
                         <p class="text-danger">{{ $errors->first('status') }}</p>
                    </div>

                    {{-- Note --}}
                    <div class="col-lg-12 mt-3">
                         <div class="form-group">
                              <label for="name"><strong>Silahkan Berikan Catatan Pada Pesanan Ini :</strong></label>
                              <input type="text" name="note" class="form-control" value="{{ $delivery->note }}">
                         </div>
                    </div>


                    {{-- Update (Submit) --}}
                    <div class="col-lg-12 mt-3">
                         <div class="form-group row">
                              <div class="col-sm-9">
                                   <a href="/delivery" class="btn btn-warning"> Kembali </a>
                                   <button type="submit" class="btn btn-primary"> Simpan </button>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </form>
</div>
{{-- END Bagian Inti --}}