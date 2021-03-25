<?php

namespace App\Http\Controllers\Api;

// IMPORT
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// MODEL
use App\Customer;  

class LoginController extends Controller
{
    public function login(Request $requset){

     $customer = Customer::with('sector')->where('email', $requset->email)->select([
          'id',
          'name',
          'email',
          'password',
          'status',
          'sector_id',
          'address',
          'phone',
          'image',
     ])->first();
     
     if ($customer) {

          // Autentifikasi
          if (password_verify($requset->password, $customer->password)) {
               return response()->json([
               'Status' => 'Success',
               'Message' => '‘Selamat Datang di VeganStore '.$customer->name,
               'Customer' => $customer
               ]);
          }
          // Bila password tidak sama
          return $this->error('Password yang Anda Masukan Salah, Silahkan Masukan Password yang Benar'); 

     }

     // Bila tidak ada email yang cocok
     return $this->error('‘Email yang Anda Masukan Tidak Ada yang Cocok, Silahkan Masukan Email yang Benar');

}
    public function error($message){
        return response()->json([
            'status' => 'Failed',
            'message' => $message
        ]);
    }
}
