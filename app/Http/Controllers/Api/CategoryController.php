<?php

namespace App\Http\Controllers\Api;

// IMPORT
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// MODEL
use App\Category;

class CategoryController extends Controller
{
     public function getCategory(){

          $category = Category::all();

          if (!$category) {
               return $this->notFound();
          }

          return response()->json([
               'Status' => 'Success',
               'Message' => 'Daftar Kategori',
               'Categories' => $category
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
               'message' => 'Data Kategori belum dimasukan'
          ]);
     }
}
