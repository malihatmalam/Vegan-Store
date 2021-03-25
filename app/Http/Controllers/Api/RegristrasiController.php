<?php

namespace App\Http\Controllers\Api;
// IMPORT
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// MODEL
use App\Customer;  

class RegristrasiController extends Controller
{
    public function register(Request $requset){
        //nama, email, password
        $validasi = Validator::make($requset->all(), [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6',
            'phone' => 'required',
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $customer = Customer::create(array_merge($requset->all(), [
            'password' => bcrypt($requset->password),
            'status' => 'active',
            'balance' => 0,
            'point' => 0,
        ]));

        // Bila Regristrasi Berhasil
        if($customer){
            return response()->json([
                'Status' => 'Success',
                'Message' => 'Selamat Datang di VeganStore, Regristrasi Anda Berhasil dan Data Anda Kami Simpan',
                'Customer' => $customer
            ]);
        }

        // Bila Regristrasi Gagal
        return $this->error('Regristasi Anda Gagal, Silahkan Coba Lagi');

    }

    public function error($message){
        return response()->json([
            'status' => 'Failed',
            'message' => $message
        ]);
    }
}
