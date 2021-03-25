<div class="container">
     
     <h4>Apakah Anda Yakin Akan Menghapus Kategori Ini ?</h4>
     <br>
     <br>
     
     <form action="{{ route('category.destroy', $category->id) }}" method="post">
          @csrf
          @method('DELETE')
          <a href="/category" class="btn btn-warning" > Kembali </a>
          <button class="btn btn-danger">Hapus</button>
     </form>

</div>