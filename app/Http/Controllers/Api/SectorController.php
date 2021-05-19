<?php

namespace App\Http\Controllers\Api;
// IMPORT
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// MODEL
use App\Sector;
use App\Sector_detail;

class SectorController extends Controller
{
     public function getSectorDetail(){

          $sectorDetail = Sector_detail::with('sector')->select([
               'id',
               'name',
               'sector_id'
          ])->get();

          if (!$sectorDetail) {
               return $this->notFound();
          }

          return response()->json([
               'Status' => 'Success',
               'Message' => 'Daftar Area (Sector Detail)',
               'SectorDetails' => $sectorDetail
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
               'message' => 'Data Area (Sector Detail) belum dimasukan'
          ]);
     }
     //
}
