
     {{-- Bagian Inti --}}
     <div>
          <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data" >
               @csrf
               
               @method('PUT')

               <div>
                    <div class="row mt-3">
                         <div class="col-md-6">
                              {{-- Nama Produk --}}
                              <div class="form-group">
                                   <label for="name"><strong> Nama Produk </strong></label>
                                   <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                                   <p class="text-danger">{{ $errors->first('name') }}</p>
                              </div>
                              {{-- Harga --}}
                              <div class="form-group">
                                   <label for="price"> <strong> Harga </strong> </label>
                                   <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                                   <p class="text-danger">{{ $errors->first('price') }}</p>
                              </div>
                              {{-- Type Unit --}}
                              <div class="form-group">
                                   <label for="weight"> <strong> Satuan / Ukuran </strong></label>
                                   <input type="text" name="typeunit" class="form-control" value="{{ $product->typeunit }}" required>
                                   <p class="text-danger">{{ $errors->first('typeunit') }}</p>
                              </div>
                         </div>
                         <div class="col-md-6">
                              {{-- Status --}}
                              <div class="form-group">
                                   <label for="status"><strong>Status</strong></label>
                                   <select name="status" class="form-control" required>
                                        <option value="publish" {{ $product->status == 'publish' ? 'selected':'' }}>Publish</option>
                                        <option value="draft" {{ $product->status == 'draft' ? 'selected':'' }}>Draft</option>
                                   </select>
                                   <p class="text-danger">{{ $errors->first('status') }}</p>
                              </div>
                              {{-- Kategori --}}
                              <div class="form-group">
                                   <label for="category_id"><strong>Kategori</strong></label>
                                   <select name="category_id" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($category as $row)
                                        <option value="{{ $row->id }}" {{ $product->category_id == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                        @endforeach
                                   </select>
                                   <p class="text-danger">{{ $errors->first('category_id') }}</p>
                              </div>
                         </div>
                    </div>
                    <div class="row mt-3">
                         <div class="col-md">
                              {{-- Deskripsi --}}
                              <div class="form-group">
                                   <label for="description"><strong>Deskripsi</strong></label>
                                   <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
                                   <p class="text-danger">{{ $errors->first('description') }}</p>
                              </div>
                         </div>
                    </div>
                    <div class="row">
                         <div class="col-md">
                              {{-- Gambar --}}
                              <div class="form-group">
                                   <label for="image"><strong>Foto Produk</strong></label>
                                   <br>
                                   <!--  TAMPILKAN GAMBAR SAAT INI -->
                                   <img src="{{ asset('products/' . $product->image) }}" width="250px" height="250px" alt="{{ $product->name }}">
                                   <hr>
                                   <input type="file" name="image" class="form-control-uniform-custom">
                                   <p><strong>Biarkan kosong jika tidak ingin mengganti gambar</strong></p>
                                   <p class="text-danger">{{ $errors->first('image') }}</p>
                              </div>
                         </div>
                    </div>
                    <div class="row">
                         {{-- Update (Submit) --}}
                         <div class="col-md" >
                              <div class="form-group row">
                                   <div class="col-sm-9">
                                        <a href="/product" class="btn btn-warning" > Kembali </a>
                                        <button type="submit" class="btn btn-primary"> Simpan </button>
                                   </div>
                              </div>
                         </div>
                    </div>                   
               </div>
          </form>
     </div>  
     {{-- END Bagian Inti --}}


