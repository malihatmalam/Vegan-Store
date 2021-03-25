{{-- Bagian Inti --}}
<div>
     <form action="{{ route('customer.update', $customer->id) }}" method="post" enctype="multipart/form-data">
          @csrf

          @method('PUT')

          <div>
               <div class="row">
                    {{-- Nama Customer --}}
                    <div class="col-lg-6">
                         <div class="form-group">
                              <label for="name"><strong>Nama :</strong></label>
                              <input type="text" name="name" class="form-control" value="{{ $customer->name }}"
                                   required>
                              <p class="text-danger">{{ $errors->first('name') }}</p>
                         </div>
                    </div>

                    {{-- Phone Customer --}}
                    <div class="col-lg-6">
                         <div class="form-group">
                              <label for="name"><strong>Nomor Telepon : </strong></label>
                              <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}"
                                   required>
                              <p class="text-danger">{{ $errors->first('phone') }}</p>
                         </div>
                    </div>

                    {{-- Sektor --}}
                    <div class="col-lg-6">
                         <div class="form-group">
                              <label for="description"> <strong> Sektor : </strong></label>
                              <select name="sector_id" class="form-control">
                                   <option value="">Pilih Sektor</option>
                                   @foreach ($sector as $row)
                                   <option value="{{ $row->id }}"
                                        {{ $customer->sector_id == $row->id ? 'selected':'' }}>{{ $row->name }}
                                        ({{ $row->code }})</option>
                                   @endforeach
                              </select>
                         </div>
                    </div>

                    {{-- Status --}}
                    <div class="col-lg-6">
                         <div class="form-group">
                              <label for="status"><strong> Status </strong></label>
                              <select name="status" class="form-control" required>
                                   <option value="active" {{ $customer->status == 'active' ? 'selected':'' }}> Aktif
                                   </option>
                                   <option value="non-active" {{ $customer->status == 'non-active' ? 'selected':'' }}>
                                        Tidak Aktif </option>
                              </select>
                              <p class="text-danger">{{ $errors->first('status') }}</p>
                         </div>

                    </div>

                    {{-- Update (Submit) --}}
                    <div class="col-lg-6">
                         <div class="form-group row">
                              <div class="col-sm-9">
                                   <a href="/customer" class="btn btn-warning"> Kembali </a>
                                   <button type="submit" class="btn btn-primary"> Simpan </button>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </form>
</div>
{{-- END Bagian Inti --}}