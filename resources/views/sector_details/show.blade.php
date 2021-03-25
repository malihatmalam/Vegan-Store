   
               <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="detailcategoryTable">                                   
                         <tbody>
                              <tr>
                                   <td> ID </td>
                                   <td class="col-sm-8" > : <b> {{  $category->id  }} </b>  </td> 
                              </tr>
                              <tr>
                                   <td> Nama </td>
                                   <td class="col-sm-8" > : <b> {{  $category->name  }} </b>  </td> 
                              </tr>
                              <tr>
                                   <td> Slug </td>
                                   <td class="col-sm-8" > : <b> {{  $category->slug  }} </b>  </td> 
                              </tr>
                              <tr>
                                   <td> Deskripsi </td>
                                   <td class="col-sm-8" > : <b> {{  $category->description }} </b>  </td> 
                              </tr>
                              <tr>
                                   <td> Tanggal Penambahan </td>
                                   <td class="col-sm-8" > :  
                                        @if($category->created_at != '')
                                             <b> {{  $category->created_at->format('d-m-Y') }} </b> 
                                        @endif
                                        @if($category->created_at == '')
                                             <b> Tanggal Belum Masih Kosong </b> 
                                        @endif
                                   </td> 
                              </tr>
                              {{-- <tr>
                                   <td> Gambar </td>
                                   <td class="col-sm-8" > :
                                        <img src="{{ asset('categorys/' . $category->image) }}" width="250px" height="250px" alt="{{ $category->name }}">  
                                        <hr> 
                                        <b> {{  $category->image  }} </b>  </td> 
                              </tr> --}}
                         </tbody>
                    </table>
               </div>

