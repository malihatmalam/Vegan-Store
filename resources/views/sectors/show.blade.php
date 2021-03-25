{{-- Bagian Inti --}}
<div class="row justify-content-end">
     <div class="col-lg-4">
          <!-- Tanggal Ditambahkan -->
          <div class="form-group">
               <label><strong>Tanggal Penambahan :</strong></label>
               <div class="form-control">
                    @if($sector->created_at != '')
                    <b> {{  $sector->created_at->format('d-m-Y') }} </b>
                    @endif
                    @if($sector->created_at == '')
                    <b> Tanggal Belum Masih Kosong </b>
                    @endif
               </div>
          </div>
     </div>
</div>
<div class="row">
     <div class="col-lg-4">
          <!-- ID -->
          <div class="form-group">
               <label><strong>ID Produk :</strong></label>
               <div class="form-control">{{  $sector->id  }}</div>
          </div>
     </div>
</div>
<div class="row">
     <div class="col-lg-6">
          <!-- Nama -->
          <div class="form-group">
               <label><strong>Nama Sektor :</strong></label>
               <div class="form-control-plaintext">{{  $sector->name  }}</div>
          </div>
     </div>
     <div class="col-lg-6">
          <!-- Kode -->
          <div class="form-group">
               <label><strong>Kode :</strong></label>
               <div class="form-control-plaintext">{{  $sector->code  }}</div>
          </div>
     </div>
</div>

<div class="row mt-4">
     <div class="col-lg-6">
          <!-- Kode -->
          <div class="form-group">
               <label><strong>Daftar Area :</strong></label>
          </div>
     </div>
</div>

<div class="table-responsive">
     <table class="table table-hover table-bordered" id="sectorTable">
          <thead>
               <tr>
                    <th> Nama </th>
                    <th> Tanggal Penambahan </th>
                    <th> Aksi </th>
               </tr>
          </thead>
          <tbody>
               @forelse ($sector->sector_detail as $row)
               <tr>
                    <td>
                         {{ $row->name }}
                    </td>
                    <td>
                         {{ $row->created_at->format('d-m-Y') }}
                    </td>
                    <td>
                         <form action="{{ route('sectorDetail.destroy', $row->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <a href="{{ route('sectorDetail.edit', $row->id) }}"
                                   class="btn btn-warning btn-sm">Edit</a>
                              <button class="btn btn-danger btn-sm">Hapus</button>
                         </form>
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


{{-- </div> --}}