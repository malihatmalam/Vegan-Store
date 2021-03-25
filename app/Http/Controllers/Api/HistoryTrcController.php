<?php

namespace App\Http\Controllers\Api;

// IMPORT
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// MODEL
use App\Order;
use App\Order_detail; 
use App\Sector;
use App\Customer; 

class HistoryTrcController extends Controller
{
     public function completed($customer_id){

          $transaction = Order::where('customer_id', $customer_id)
          ->where('status', 'Success')
          ->orderBy('created_at', 'DESC')
          ->get();

          if (!$transaction) {
               return $this->notFound();
          }

          return response()->json([
               'Status' => 'Success',
               'Message' => 'Daftar Transaksi Selesai (Completed)',
               'Transactions' => $transaction
          ]);
     }

     public function process($customer_id){

          $transaction = Order::where('customer_id', $customer_id)
          ->where('status', 'Wait')
          ->orwhere('status', 'Delivery')
          ->orderBy('created_at', 'DESC')
          ->get();

          if (!$transaction) {
               return $this->notFound();
          }

          return response()->json([
               'Status' => 'Success',
               'Message' => 'Daftar Transaksi Sedang Diproses (Process)',
               'Transactions' => $transaction
          ]);
     }

     public function detailTransaction($id){

          $transaction = Order::with([
               'orderDetail',
               'customer',
               ])
          ->find($id);

          if (!$transaction) {
               return $this->notFound();
          }

          return response()->json([
               'Status' => 'Success',
               'Message' => 'Daftar Transaksi Sedang Diproses (Process)',
               'Transaction' => $transaction
          ]);
     }
     
     public function error($message){
          return response()->json([
               'status' => 'Failed',
               'message' => $message
          ]);
     }

     public function notFound(){
          return response()->json([
               'status' => 'Success',
               'message' => 'Data Transaksi Tidak Ada'
          ]);
     }
}
