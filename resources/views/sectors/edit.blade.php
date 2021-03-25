
     {{-- Bagian Inti --}}
     <div>
          <!-- PASTIKAN MENGIRIMKAN ID PADA ROUTE YANG DIGUNAKAN -->
          <form action="{{ route('sector.update', $sector->id) }}" method="post" enctype="multipart/form-data" >
               @csrf
               <!-- KARENA UPDATE MAKA KITA GUNAKAN DIRECTIVE DIBAWAH INI -->
               @method('PUT')


               <!-- FORM INI SAMA DENGAN CREATE, YANG BERBEDA HANYA ADA TAMBAHKAN VALUE UNTUK MASING-MASING INPUTAN  -->

               <div>
                    <div class="row">

                         <div class="col-xs-12 col-sm-12 col-md-12">
                             {{-- Nama --}}
                                   <div class="form-group">
                                        <label for="name"><strong>Nama Seckor</strong></label>
                                        <input type="text" name="name_edit" class="form-control" value="{{ $sector->name }}" required>
                                        <p class="text-danger">{{ $errors->first('name_edit') }}</p>
                                   </div>
                         </div>

                         <div class="col-xs-12 col-sm-12 col-md-12">
                             {{-- Kode --}}
                                   <div class="form-group">
                                        <label for="name"><strong>Kode</strong></label>
                                        <input type="text" name="code_edit" class="form-control" value="{{ $sector->code }}" required>
                                        <p class="text-danger">{{ $errors->first('code_edit') }}</p>
                                   </div>
                         </div>

                         <div class="col-xs-12 col-sm-12 col-md-12" >
                              
                              {{-- Update (Submit) --}}
                              <div class="form-group row">
                                   <div class="col-sm-9">
                                        <a href="/sector" class="btn btn-warning" > Kembali </a>
                                        <button type="submit" class="btn btn-primary"> Simpan </button>
                                   </div>
                              </div>
                         </div>

                    </div>
               </div>
          </form>
     </div>  

