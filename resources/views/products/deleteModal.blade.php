<div class="container">
     
     <h4>Apakah Anda Yakin Akan Menghapus Produk Ini ?</h4>
     <br>
     <br>
     
     <form action="{{ route('product.destroy', $product->id) }}" method="post">
          @csrf
          @method('DELETE')
          <a href="/product" class="btn btn-warning" > Kembali </a>
          <button class="btn btn-danger">Hapus</button>
     </form>

</div>