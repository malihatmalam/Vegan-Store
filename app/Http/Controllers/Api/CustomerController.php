<?php

namespace App\Http\Controllers\Api;

// IMPORT
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// MODEL
use App\Customer; 

use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function login(Request $requset){
        $customer = Customer::where('email', $requset->email)->first();

        if($customer){
            if(password_verify($requset->password, $customer->password)){
                return response()->json([
                    'success' => 1,
                    'message' => 'Selamat datang '.$customer->name,
                    'customer' => $customer
                ]);
            }
            return $this->error('Password Salah');
        }
        return $this->error('Akun tidak terdaftar');
    }

    public function register(Request $requset){
        //nama, email, password
        $validasi = Validator::make($requset->all(), [
            'name' => 'required',
            'email' => 'required|unique:customers',
            'phone' => 'required|unique:customers',
            'password' => 'required|min:6'
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $customer = Customer::create(array_merge($requset->all(), [
            'password' => bcrypt($requset->password),
            'status' => "non-active",
            'balance' => 0,
            'point' => 0,
        ]));

        if($customer){
            return response()->json([
                'success' => 1,
                'message' => 'Selamat datang'.$customer->name.', Register Anda Berhasil',
                'customer' => $customer
            ]);
        }

        return $this->error('Maaf Registrasi gagal');

    }

    public function error($pasan){
        return response()->json([
            'success' => 0,
            'message' => $pasan
        ]);
    }

}
