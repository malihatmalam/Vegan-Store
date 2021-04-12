<!-- MASTER -->
@extends('layouts.admin')

{{-- Title --}}
@section('title')
<title>Proses Pesanan</title>
@endsection
{{-- END Title --}}

@section('header')
<!-- Page header -->
<div class="page-header">
     <!-- Breadcrumb -->
     <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
               <div class="breadcrumb">
                    <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Halaman</a>
                    <span class="breadcrumb-item active">Proses Pesanan</span>
               </div>
          </div>
     </div>
     <!-- /Breadcrumb -->

     <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
               <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Halaman</span> -
                    Proses Pesanan
               </h4>
               <a href="/" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
          </div>
     </div>
</div>
<!-- /page header -->
@endsection

@section('content')
{{-- Bagian Inti --}}
<div class="container-fluid">
     <div class="animated fadeIn">
          <div class="row">
               <div class="col-lg">
                    {{-- Bagian Inti --}}
                    <div class="card">
                         <div class="card-header bg-white header-elements-inline">
                              <h6 class="card-title"></h6>
                              <div class="header-elements">
                                   <div class="list-icons">
                                        <a class="list-icons-item" data-action="remove"></a>
                                   </div>
                              </div>
                         </div>

                         <form action="{{ route('process', $order->id) }}" method="post" class="wizard-form steps-basic"  data-fouc>
                              @csrf
                              <h6>Detail Pesanan</h6>
                              <fieldset>
                                   {{-- Date --}}
                                   <div class="row justify-content-end">
                                        <div class="col-lg-4">
                                             <!-- Tanggal Ditambahkan -->
                                             <div class="form-group">
                                                  <label><strong>Tanggal Pembuatan :</strong></label>
                                                  <div class="form-control">
                                                       @if($order->created_at != '')
                                                       <b> {{  $order->created_at->format('d-m-Y') }} </b>
                                                       @endif
                                                       @if($order->created_at == '')
                                                       <b> Tanggal Belum Masih Kosong </b>
                                                       @endif
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   {{-- General --}}
                                   <div class="row mt-3">
                                        <div class="col-lg-6">
                                             <!-- Invoice -->
                                             <div class="form-group">
                                                  <label>
                                                       <h4><strong>Nomor Invoice :</strong></h4>
                                                  </label>
                                                  <div class="form-control-plaintext">
                                                       <h6>{{  $order->invoice  }}</h6>
                                                  </div>
                                             </div>

                                        </div>
                                   </div>
                                   {{-- Customer Information --}}
                                   <div>
                                        <div class="row mt-2">
                                             <div class="col-lg-12">
                                                  <h4><strong> Informasi Pelanggan </strong></h4>
                                             </div>
                                        </div>
                                        <div class="row mt-2">
                                             <div class="col-lg-6">
                                                  <!-- Name Customer -->
                                                  <div class="form-group">
                                                       <label><strong>Nama Pelanggan :</strong></label>
                                                       <div class="form-control-plaintext">{{  $order->customer_name }}
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-lg-6">
                                                  <!-- Number Phone -->
                                                  <div class="form-group">
                                                       <label><strong>Nomor Telepon :</strong></label>
                                                       <div class="form-control-plaintext">
                                                            +62{{  $order->customer_phone }}
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   {{-- Order Information --}}
                                   <div>
                                        <div class="row mt-3">
                                             <div class="col-lg-12">
                                                  <h4><strong> Informasi Pesanan </strong></h4>
                                             </div>
                                        </div>
                                        <div class="row mt-2">
                                             <div class="col-lg-4">
                                                  <!-- Scheduled  -->
                                                  <div class="form-group">
                                                       <label><strong>Jenis Pesanan :</strong></label>
                                                       <div class="form-control-plaintext">
                                                            @if($order->scheduled == true)
                                                            Berlangganan (Pesanan Yang Berlangganan)
                                                            @endif
                                                            @if($order->scheduled == false)
                                                            Sekali Beli
                                                            @endif
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-lg-4">
                                                  <!-- Use Plastic  -->
                                                  <div class="form-group">
                                                       <label><strong>Pesanan Menggunakan Plastik :</strong></label>
                                                       <div class="form-control-plaintext">
                                                            @if($order->useplastic == true)
                                                            <Strong>IYA</Strong> (Menggunakan Plastik)
                                                            @endif
                                                            @if($order->useplastic == false)
                                                            <strong>TIDAK</strong>
                                                            @endif
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-lg-4">
                                                  <!-- Paymethode -->
                                                  <div class="form-group">
                                                       <label><strong>Metode Pembayaran :</strong></label>
                                                       <div class="form-control-plaintext">
                                                            @if($order->paymethod == "CASH")
                                                            <strong>Cash</strong> (Bayar Langsung)
                                                            @endif
                                                            @if($order->paymethod == "DEBT")
                                                            Memotong Saldo
                                                            @endif
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-lg-12">
                                                  <!-- Note -->
                                                  <div class="form-group">
                                                       <label><strong>Catatan :</strong></label>
                                                       <div class="form-control-plaintext">
                                                            {{ $order->note }}
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="row mt-2">
                                             <div class="col-lg-12">
                                                  <div class="form-grup">
                                                       <label><strong>Daftar Pesanan :</strong></label>
                                                       <div class="table-responsive">
                                                            <table class="table table-hover table-bordered"
                                                                 id="sectorTable">
                                                                 <thead>
                                                                      <tr>
                                                                           <th> Nama </th>
                                                                           <th> Harga </th>
                                                                           <th> Item </th>
                                                                           <th> Total </th>
                                                                      </tr>
                                                                 </thead>
                                                                 <tbody>
                                                                      @forelse ($order->orderDetail as $row)
                                                                      <tr>
                                                                           <td>
                                                                                @if ($row->product_name != null)
                                                                                {{ $row->product_name }}
                                                                                @endif
                                                                                @if ($row->product_name == null)
                                                                                {{ $row->product->name }}
                                                                                @endif
                                                                           </td>
                                                                           <td>
                                                                                Rp
                                                                                {{ number_format($row->price,2,',','.') }}
                                                                           </td>
                                                                           <td>
                                                                                {{ $row->qty }}
                                                                           </td>
                                                                           <td>
                                                                                Rp
                                                                                {{ number_format($row->total,2,',','.')  }}
                                                                           </td>
                                                                      </tr>
                                                                      @empty
                                                                      <tr>
                                                                           <td colspan="6" class="text-center">Tidak ada
                                                                                data
                                                                           </td>
                                                                      </tr>
                                                                      @endforelse

                                                                 </tbody>
                                                            </table>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="row mt-2 justify-content-end">
                                             <div class="col-lg-6">
                                                  {{-- Sub total --}}
                                                  <div class="form-grup">
                                                       <div class="row">
                                                            <div class="col-md-6">
                                                                 <label>
                                                                      <h6>
                                                                           <strong>Subtotal :</strong>
                                                                      </h6>
                                                                 </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                 <h6>
                                                                      Rp {{ number_format($order->subtotal,2,',','.') }}
                                                                 </h6>
                                                            </div>
                                                       </div>
                                                  </div>

                                                  {{-- Ongkos --}}
                                                  <div class="form-grup">
                                                       <div class="row">
                                                            <div class="col-md-6">
                                                                 <label>
                                                                      <h6>
                                                                           <strong>Ongkos :</strong>
                                                                      </h6>
                                                                 </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                 <h6>
                                                                      Rp
                                                                      {{ number_format($order->delivery_price,2,',','.') }}
                                                                 </h6>
                                                            </div>
                                                       </div>
                                                  </div>
                                                  {{-- Total --}}
                                                  <div class="form-grup">
                                                       <div class="row">
                                                            <div class="col-md-6">
                                                                 <label>
                                                                      <h5>
                                                                           <strong>Total :</strong>
                                                                      </h5>
                                                                 </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                 <h5>
                                                                      Rp {{ number_format($order->total,2,',','.') }}
                                                                 </h5>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </fieldset>

                              <h6>Melakukan Pengiriman</h6>
                              <fieldset>
                                   {{-- Delivery Information --}}
                                   <div>
                                        <div class="row mt-2">
                                             <div class="col-lg-12">
                                                  <h4><strong> Informasi Pengiriman </strong></h4>
                                             </div>
                                        </div>
                                        <div class="row mt-1">
                                             <div class="col-lg">
                                                  <!-- Address -->
                                                  <div class="form-group">
                                                       <label><strong>Alamat Pengiriman :</strong></label>
                                                       <div class="form-control-plaintext">{{  $order->address }}</div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="row">
                                             <div class="col-lg-6">
                                                  <!-- Sector Detail -->
                                                  <div class="form-group">
                                                       <label><strong>Area Pengiriman :</strong></label>
                                                       <div class="form-control-plaintext">
                                                            {{  $order->detailSector_name }}</div>
                                                  </div>
                                             </div>
                                             <div class="col-lg-6">
                                                  <!-- Sector  -->
                                                  <div class="form-group">
                                                       <label><strong>Sektor Pengiriman :</strong></label>
                                                       <div class="form-control-plaintext">
                                                            @if($order->sector_id != null)
                                                            {{  $order->sector->name  }} ({{  $order->sector->code  }})
                                                            @endif
                                                            @if($order->sector_id == "")
                                                            Sector Belum Di isi
                                                            @endif
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="row">
                                             <!-- Delivery -->
                                             <div class="col-lg-6">
                                                  <!-- Delivery Date -->
                                                  <div class="form-group">
                                                       <label><strong>Tanggal Pengiriman :</strong></label>
                                                       <div class="form-control-plaintext">{{  $order->delivery_date }}
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-lg-6">
                                                  <!-- Delivery Time  -->
                                                  <div class="form-group">
                                                       <label><strong>Waktu Pengiriman :</strong></label>
                                                       <div class="form-control-plaintext">{{  $order->delivery_time }}
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>

                                   {{-- Choose Courir --}}
                                   <div class="row mt-4">
                                        <div class="col-lg-12">
                                             <h4><strong> Memilih Kurir </strong></h4>
                                        </div>
                                   </div>

                                   <div class="row mt-2">
                                        {{-- Courir --}}   
                                        <div class="col-lg-12">
                                             <div class="form-group">
                                                  <label for="courir"><strong>Kurir</strong> <span class="text-danger">*</span></label>
                                                  <select name="courir" data-placeholder="Pilih Kurir" class="form-control form-control-select2 required" required>
                                                       <option></option>
                                                       @foreach ($courir as $cr)
                                                            <option value="{{ $cr->id }}">{{ $cr->name }}</option>
                                                       @endforeach
                                                  </select>
                                                  <p class="text-danger">{{ $errors->first('courir') }}</p>
                                             </div>
                                        </div>

                                        {{-- Note --}}
                                        <div class="col-lg-12">
                                             <div class="form-group">
                                                  <label for="name"><strong>Jika Diperlukan, Silahkan Berikan Catatan Pengiriman Ini :</strong></label>
                                                  <input type="text" name="delivery_note" class="form-control">
                                             </div>
                                        </div>
                                   </div>

                              </fieldset>

                              <h6>Proses Selesai</h6>
                              <fieldset>
                                   <div class="row md-6 mt-3">
                                        <div class="col-lg">
                                             {{-- Gambar Selesai  --}}
                                             <img src="{{ asset('question-mark.png') }}"
                                                  width="250px" height="250px" alt="pertanyaan" class="mx-auto d-block">
                                        </div>
                                   </div>
                                   <div class="row justify-content-center mt-4">
                                        <h2>Apakah anda yakin ?</h2>
                                   </div>
                                   <div class="row justify-content-center mt-6">
                                        <h5>Pesanan akan diproses setelah mengeklik tombol submit.</h5>
                                   </div>
                              </fieldset>

                         </form>
                    </div>

               </div>
          </div>
     </div>
</div>
@endsection

{{-- Script --}}
@section('js')
<script>
var FormWizard = function() {


//
// Setup module components
//

// Wizard
var _componentWizard = function() {

     // let courir = $("input[name=courir]").val();
     // let delivery_note = $("input[name=delivery_note]").val();
     // let id = $order->id;

    if (!$().steps) {
        console.warn('Warning - steps.min.js is not loaded.');
        return;
    }

    // Basic wizard setup
    $('.steps-basic').steps({
        headerTag: 'h6',
        bodyTag: 'fieldset',
        transitionEffect: 'fade',
        titleTemplate: '<span class="number">#index#</span> #title#',
        labels: {
            previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
            next: 'Next <i class="icon-arrow-right14 ml-2" />',
            finish: 'Submit form <i class="icon-arrow-right14 ml-2" />'
        },
        onFinished: function (event, currentIndex) {
          var form = $(this);
          // Submit form input
          form.submit();

          // $.ajax({
          //      type:'POST',
          //      url:'/getprocess/' + id,
          //      data:{
          //           courir:$("input[name=courir]").val(), 
          //           delivery_note:$("input[name=delivery_note]").val(), 
          //           _token:'{{ csrf_token() }}'},
          //      success:function(data){
          //           window.location= "{{ url('/')}}";
          //           alert(data.success);
          //      }
               
          // });
        }
    });

    // Async content loading
    $('.steps-async').steps({
        headerTag: 'h6',
        bodyTag: 'fieldset',
        transitionEffect: 'fade',
        titleTemplate: '<span class="number">#index#</span> #title#',
        loadingTemplate: '<div class="card-body text-center"><i class="icon-spinner2 spinner mr-2"></i>  #text#</div>',
        labels: {
            previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
            next: 'Next <i class="icon-arrow-right14 ml-2" />',
            finish: 'Submit form <i class="icon-arrow-right14 ml-2" />'
        },
        onContentLoaded: function (event, currentIndex) {
            $(this).find('.card-body').addClass('hide');

            // Re-initialize components
            _componentSelect2();
            _componentUniform();
        },
        onFinished: function (event, currentIndex) {
            alert('Form submitted.');
        }
    });

    // Saving wizard state
    $('.steps-state-saving').steps({
        headerTag: 'h6',
        bodyTag: 'fieldset',
        titleTemplate: '<span class="number">#index#</span> #title#',
        labels: {
            previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
            next: 'Next <i class="icon-arrow-right14 ml-2" />',
            finish: 'Submit form <i class="icon-arrow-right14 ml-2" />'
        },
        transitionEffect: 'fade',
        saveState: true,
        autoFocus: true,
        onFinished: function (event, currentIndex) {
            alert('Form submitted.');
        }
    });

    // Specify custom starting step
    $('.steps-starting-step').steps({
        headerTag: 'h6',
        bodyTag: 'fieldset',
        titleTemplate: '<span class="number">#index#</span> #title#',
        labels: {
            previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
            next: 'Next <i class="icon-arrow-right14 ml-2" />',
            finish: 'Submit form <i class="icon-arrow-right14 ml-2" />'
        },
        transitionEffect: 'fade',
        startIndex: 2,
        autoFocus: true,
        onFinished: function (event, currentIndex) {
            alert('Form submitted.');
        }
    });

    // Enable all steps and make them clickable
    $('.steps-enable-all').steps({
        headerTag: 'h6',
        bodyTag: 'fieldset',
        transitionEffect: 'fade',
        enableAllSteps: true,
        titleTemplate: '<span class="number">#index#</span> #title#',
        labels: {
            previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
            next: 'Next <i class="icon-arrow-right14 ml-2" />',
            finish: 'Submit form <i class="icon-arrow-right14 ml-2" />'
        },
        onFinished: function (event, currentIndex) {
            alert('Form submitted.');
        }
    });


    //
    // Wizard with validation
    //

    // Stop function if validation is missing
    if (!$().validate) {
        console.warn('Warning - validate.min.js is not loaded.');
        return;
    }

    // Show form
    var form = $('.steps-validation').show();


    // Initialize wizard
    $('.steps-validation').steps({
        headerTag: 'h6',
        bodyTag: 'fieldset',
        titleTemplate: '<span class="number">#index#</span> #title#',
        labels: {
            previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
            next: 'Next <i class="icon-arrow-right14 ml-2" />',
            finish: 'Submit form <i class="icon-arrow-right14 ml-2" />'
        },
        transitionEffect: 'fade',
        autoFocus: true,
        onStepChanging: function (event, currentIndex, newIndex) {

            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex) {
                return true;
            }

            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex) {

                // To remove error styles
                form.find('.body:eq(' + newIndex + ') label.error').remove();
                form.find('.body:eq(' + newIndex + ') .error').removeClass('error');
            }

            form.validate().settings.ignore = ':disabled,:hidden';
            return form.valid();
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ':disabled';
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            alert('Submitted!');
        }
    });


    // Initialize validation
    $('.steps-validation').validate({
        ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
        errorClass: 'validation-invalid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Unstyled checkboxes, radios
            if (element.parents().hasClass('form-check')) {
                error.appendTo( element.parents('.form-check').parent() );
            }

            // Input with icons and Select2
            else if (element.parents().hasClass('form-group-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }

            // Input group, styled file input
            else if (element.parent().is('.uniform-uploader, .uniform-select') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            // Other elements
            else {
                error.insertAfter(element);
            }
        },
        rules: {
            email: {
                email: true
            }
        }
    });
};

// Uniform
var _componentUniform = function() {
    if (!$().uniform) {
        console.warn('Warning - uniform.min.js is not loaded.');
        return;
    }

    // Initialize
    $('.form-input-styled').uniform({
        fileButtonClass: 'action btn bg-blue'
    });
};

// Select2 select
var _componentSelect2 = function() {
    if (!$().select2) {
        console.warn('Warning - select2.min.js is not loaded.');
        return;
    }

    // Initialize
    var $select = $('.form-control-select2').select2({
        minimumResultsForSearch: Infinity,
        width: '100%'
    });

    // Trigger value change when selection is made
    $select.on('change', function() {
        $(this).trigger('blur');
    });
};


//
// Return objects assigned to module
//

return {
    init: function() {
        _componentWizard();
        _componentUniform();
        _componentSelect2();
    }
}
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
FormWizard.init();
});
</script>
@endsection



{{-- </div> --}}