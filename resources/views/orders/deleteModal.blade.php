<div class="container">
     
     <h4>Apakah Anda Yakin Akan Menghapus Customer Ini ?</h4>
     <br>
     <br>
     
     <form action="{{ route('customer.destroy', $customer->id) }}" method="post">
          @csrf
          @method('DELETE')
          <a href="/customer" class="btn btn-warning" > Kembali </a>
          <button class="btn btn-danger">Hapus</button>
     </form>

</div>