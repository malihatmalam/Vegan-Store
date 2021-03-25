<!-- MASTER -->
@extends('layouts.admin')

{{-- Title --}}
@section('title')
    <title> Data Pengiriman </title>
@endsection
{{-- END Title --}}

@section('content')
<main class="main">

     {{-- Breadcrumb, Home > Pengriman > Data Pengiriman  --}}
     <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Pengiriman</li>
          <li class="breadcrumb-item active">Data Pengiriman</li>
     </ol>
     {{-- END Breadcrumb, Home > Pengriman > Data Pengiriman --}}

     {{-- Bagian Inti --}}
     <div class="container-fluid">
          <div class="animated fadeIn">
               <div class="row">

                    {{-- List Courir --}}
                    <div class="col-md-12">
                         <div class="card">

                              {{-- Bagian Header Halaman --}}
                              <div class="card-header">
                                   <h4 class="card-title">
                                        Data Pengiriman
                                   </h4>
                              </div>
                              {{-- END Bagian Header Halaman --}}

                              {{-- Bagian Body Halaman --}}
                              <div class="card-body">

                                   <!-- FLASH SESSION -->
                                   @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                   @endif

                                   @if (session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                   @endif
                                   <!-- END FLASH SESSION -->
                                   
                                   <ul class="nav nav-tabs" role="tablist">
                                     <li class="nav-item">
                                       <a class="nav-link active" data-toggle="tab" href="#delivery" role="tab" aria-controls="delivery">
                                            Belum Dikirim
                                            <span class="badge badge-warning"> Delivery </span>
                                       </a>
                                     </li>
                                     <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#delivery" role="tab" aria-controls="delivery">
                                             Belum Dikirim
                                             <span class="badge badge-success"> Success </span>
                                        </a>
                                     </li>
                                   </ul>
                                   <div class="tab-content">
                                        
                                        <div class="tab-pane active" id="delivery" role="tabpanel">
                                             <!-- TABLE Deliveri (Sedang Dikirim) -->
                                             <div class="table-responsive">
                                                  <table class="table table-hover table-bordered" id="deliveryTable">
                                                       <thead>
                                                            <tr>
                                                                 <th> Nomor Pengiriman </th>
                                                                 <th> Nomor Pesanan </th>
                                                                 <th> Kurir </th>
                                                                 <th> Sektor </th>
                                                                 <th> Tanggal Pengiriman </th>
                                                                 <th> Catatan </th>
                                                                 <th> Action </th>
                                                            </tr>
                                                       </thead>                                         
                                                       <tbody>
                                                       </tbody>
                                                  </table>
                                             </div>
                                             <!-- END TABLE -->
                                        </div>

                                        <div class="tab-pane" id="success" role="tabpanel"> 
                                             <!-- TABLE Deliveri (Sedang Dikirim) -->
                                             <div class="table-responsive">
                                                  <table class="table table-hover table-bordered" id="successTable">
                                                       <thead>
                                                            <tr>
                                                                 <th> Nomor Pengiriman </th>
                                                                 <th> Nomor Pesanan </th>
                                                                 <th> Kurir </th>
                                                                 <th> Sektor </th>
                                                                 <th> Tanggal Pengiriman </th>
                                                                 <th> Catatan </th>
                                                                 <th> Action </th>
                                                            </tr>
                                                       </thead>                                         
                                                       <tbody>
                                                       </tbody>
                                                  </table>
                                             </div>
                                             <!-- END TABLE -->
                                        </div>
                                        
                                   </div>

                              </div>
                              {{-- END Bagian Body Halaman --}}
                         </div>
                    </div>
               </div>
          </div>
     </div>
     {{-- END Bagian Inti --}}

{{-- Modal --}}
     {{-- Show Modal --}}
     <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
     aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-md" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h3 class="modal-title" id="exampleModalLongTitle"><b>Detail Customer</b></h3>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body" id="showBody">
                         <div>
                              <!-- the result to be displayed apply here -->
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <!-- Edit modal -->
     <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h3 class="modal-title" id="exampleModalLongTitle"><b>Update Customer</b></h3>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body" id="editBody">
                         <div>
                              <!-- the result to be displayed apply here -->
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <!-- Delete modal -->
     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
     aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h3 class="modal-title" id="exampleModalLongTitle"><b>Deleted Customer</b></h3>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body" id="deleteBody">
                         <div>
                              <!-- the result to be displayed apply here -->
                         </div>
                    </div>
               </div>
          </div>
     </div>
{{-- END Modal --}}


</main>
@endsection

{{-- Script --}}
@section('js')

<script>
     $(document).ready(function(){
          $('#productTable').DataTable({
               processing:true,
               serverside:true,
               ajax:"{{ route('ajax.get.data.customer.index') }}",
               columns:[
                    {data:'name',name:'name'},
                    {data:'email',name:'email'},
                    {data:'sector.code',name:'sector.code'},
                    {data:'format_phone',name:'format_phone'},
                    {data:'format_date_crt',name:'format_date_crt'},
                    {data:'label_status',name:'label_status'},
                    {data:'action',name:'view',orderable: false, searchable: false},           
               ]
          });
     });

</script>


<script>

// display a modal (Show modal)
$(document).on('click', '#showButton', function(event) {
    event.preventDefault();
    let href = $(this).attr('data-attr');
    $.ajax({
        url: href,
        beforeSend: function() {
            $('#loader').show();
        },
        // return the result
        success: function(result) {
            $('#showModal').modal("show");
            $('#showBody').html(result).show();
        },
        complete: function() {
            $('#loader').hide();
        },
        error: function(jqXHR, testStatus, error) {
            console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
            $('#loader').hide();
        },
        timeout: 8000
    })
});


// display a modal ( Edit modal)
$(document).on('click', '#editButton', function(event) {
    event.preventDefault();
    let href = $(this).attr('data-attr');
    $.ajax({
        url: href,
        beforeSend: function() {
            $('#loader').show();
        },
        // return the result
        success: function(result) {
            $('#editModal').modal("show");
            $('#editBody').html(result).show();
        },
        complete: function() {
            $('#loader').hide();
        },
        error: function(jqXHR, testStatus, error) {
            console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
            $('#loader').hide();
        },
        timeout: 8000
    })
});


// display a modal ( Delete modal)
$(document).on('click', '#deleteButton', function(event) {
    event.preventDefault();
    let href = $(this).attr('data-attr');
    $.ajax({
        url: href,
        beforeSend: function() {
            $('#loader').show();
        },
        // return the result
        success: function(result) {
            $('#deleteModal').modal("show");
            $('#deleteBody').html(result).show();
        },
        complete: function() {
            $('#loader').hide();
        },
        error: function(jqXHR, testStatus, error) {
            console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
            $('#loader').hide();
        },
        timeout: 8000
    })
});


</script>

@endsection
