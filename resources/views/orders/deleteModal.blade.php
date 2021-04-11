<div class="container">
     
     <h4>Apakah Anda Yakin Akan Menghapus Pesanan Ini ?</h4>
     <br>
     <br>
     
     <form action="{{ route('order.destroy', $order->id) }}" method="post">
          @csrf
          @method('DELETE')
          <a href="/order" class="btn btn-warning" > Kembali </a>
          <button class="btn btn-danger">Hapus</button>
     </form>

</div>