<div class="container">
     
     <h4>Apakah Anda Yakin Akan Menghapus Kurir Ini ?</h4>
     <br>
     <br>
     
     <form action="{{ route('courir.destroy', $courir->id) }}" method="post">
          @csrf
          @method('DELETE')
          <a href="/courir" class="btn btn-warning" > Kembali </a>
          <button class="btn btn-danger">Hapus</button>
     </form>

</div>