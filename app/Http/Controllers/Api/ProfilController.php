<?php

namespace App\Http\Controllers\Api;
// IMPORT
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// MODEL
use App\Customer;

class ProfilController extends Controller
{
     public function profil($id){

          $customer = Customer::find($id);

          if (!$customer) {
               return $this->error();
          }

          return response()->json([
               'Status' => 'Success',
               'Message' => 'Berikut profil anda',
               'Customers' => $customer
          ]);
     }
     
     public function balance($id){

          $customer = Customer::select([
               'id',
               'balance',
               'point',
          ])->find($id);

          if (!$customer) {
               return $this->error();
          }

          return response()->json([
               'Status' => 'Success',
               'Message' => 'Ini Balance dan Point Anda',
               'Customers' => $customer
          ]);
     }
     
     public function error(){
          return response()->json([
               'status' => 'Failed',
               'message' => 'Permintaan anda Gagal',
          ]);
     }

}
