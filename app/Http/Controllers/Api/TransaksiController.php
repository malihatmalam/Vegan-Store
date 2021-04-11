<?php

namespace App\Http\Controllers\Api;
// IMPORT
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Str;
// MODEL
use App\Order;
use App\Order_detail; 
use App\Sector;
use App\Sector_detail;
use App\Customer; 

class TransaksiController extends Controller
{
    public function transaction(Request $requset){
        //nama, email, password
        $validasi = Validator::make($requset->all(), [
            'customer_id' => 'required',
            'useplastic' => 'required',
            'total_item' => 'required|numeric',
            'delivery_date' => 'required',
            'delivery_time' => 'required',
            'address' => 'required',
            'scheduled' => 'required',
            'sector_id' => 'required',
            'subtotal' => 'required',
            'paymethod' => 'required',
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        // Sector
        $sector = Sector::with('sector_detail')->find($requset->sector_id);

        // Scheduled
        if ($requset->scheduled == true) {
            // Bila berlangganan 
            $scheduled = "002";
        }
        $scheduled = "001";

        // Customer
        $customer = Customer::find($requset->customer_id);
        $customer_name = $customer->name; // Customer name
        
        // Delivery Price
        $free_delivery_price = 100000; // Batas minimal pembelian untuk gratis ongkir
        if ($requset->subtotal < $free_delivery_price) {
            $delivery_price = 10000;
        }
        $delivery_price = 0;


        // Invoice 
        // schedule/sector_code/3_char_customer_name/date_now/random(100 - 999) 
        $invoice = $scheduled.'/'.$sector->code.'/'.substr($customer_name,0,3).'/'.now()->format('Y-m-d').'/'.rand(100,999);

        // Transaction 
        $transaction = Order::create([
            'invoice' => $invoice,
            'customer_id' => $requset->customer_id,
            'customer_name' => $customer->name,
            'customer_phone' => $customer->phone,
            'useplastic' => $requset->useplastic,
            'subtotal' => $requset->subtotal,
            'total_item' => $requset->total_item,
            'delivery_price' => $delivery_price,
            'delivery_date' => $requset->delivery_date,
            'delivery_time' => $requset->delivery_time,
            'note' => $requset->note,
            'address' => $requset->address,
            'detailSector_name' => $requset->detailSector_name,
            'scheduled' => $requset->scheduled,
            'status' => "Wait",
            'sector_id' => $requset->sector_id,
            'total' => $requset->subtotal + $delivery_price,
            'paymethod' => $requset->paymethod,
        ]);
        $data_transaction = array_merge($requset->all(), [
            'invoice' => $invoice,
            'customer_name' => $customer->name,
            'customer_phone' => $customer->phone,
            'delivery_price' => $delivery_price,
            'status' => "Wait",
            'total' => $requset->subtotal + $delivery_price,
        ]);

        \DB::beginTransaction();
        

        // Memasukan detail order kedalam order
        foreach ($requset->products as $product) {
            $transaction_detail = Order_detail::create([
                'order_id' => $transaction->id,
                'product_id' => $product['id'],
                'product_name' => $product['name'],
                'price' => $product['price'],
                'qty' => $product['qty'],
                'total' => $product['price'] * $product['qty'] ,
            ]);
        }

        if (!empty($transaction) && !empty($transaction_detail) ) {
            \DB::commit();
            return response()->json([
                'Status' => 'Success',
                'Message' => 'Transaksi Anda BERHASIL Kami Simpan',
                'Transaction' =>  collect($transaction)
            ]);
        }
        else {
            \DB::rollback();
            $this->error('Transaksi Anda GAGAL Kami Simpan');   
        }

    }

    public function error($message){
        return response()->json([
            'success' => 'Failed',
            'message' => $message
        ]);
    }
}
