<div class="container">
     
     <h4>Apakah Anda Yakin Akan Menghapus Data Pengiriman Ini ?</h4>
     <br>
     <br>
     
     <form action="{{ route('delivery.destroy', $delivery->id) }}" method="post">
          @csrf
          @method('DELETE')
          <a href="/delivery" class="btn btn-warning" > Kembali </a>
          <button class="btn btn-danger">Hapus</button>
     </form>

</div>