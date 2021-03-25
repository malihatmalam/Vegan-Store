<div class="container">
     
     <h4>Apakah Anda Yakin Akan Menghapus Sektor Ini ?</h4>
     <br>
     <br>
     
     <form action="{{ route('sector.destroy', $sector->id) }}" method="post">
          @csrf
          @method('DELETE')
          <a href="/sector" class="btn btn-warning" > Kembali </a>
          <button class="btn btn-danger">Hapus</button>
     </form>

</div>