<?php

namespace App\Http\Controllers\Api;
// IMPORT
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// MODEL
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function getAllProduct(){
        $product = Product::all();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Semua Data Produk Telah Diambil',
            'Products' => $product
        ]);
    }

    public function productSearch($keyword){
        
        // Melakukan pencarian product dengan kunci search
        $product = Product::with('category')
        ->whereHas('category', function ($query) use($keyword) {
            $query->where('name','like',"%".$keyword."%");
        })
        ->orwhere('name','like',"%".$keyword."%")
        ->orderBy('name', 'ASC')->get();   
        
        if (!$product) {
            return $this->notFound();
        }

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data Product, dengan Pencarian = '.$keyword.', Telah Ditemukan',
            'Products' => $product
        ]);     
    }

    public function productByCategory($category){
        
        // Ambil data Produk sesuai dengan kategori 

        $product = Product::with('category')
        ->whereHas('category', function ($query) use($category) {
            $query->where('name', $category );
        })
        ->orderBy('name', 'ASC')->get();   

        if (!$product) {
            return $this->notFound();
        }
        
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data Product, dengan Kategori = '. $category.', Telah ditemukan ',
            'Products' => $product
        ]);

    }

    public function detailProduct($id){
        
        // Ambil data Produk sesuai dengan kategori 

        $product = Product::with('category')
        ->find($id);   

        if (!$product) {
            return $this->notFound();
        }
        
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Detail Product Telah ditemukan',
            'Products' => $product
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
            'message' => 'Product yang Anda Cari Tidak Ada'
        ]);
    }
    //
}
