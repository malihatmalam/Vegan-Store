<?php

namespace App\Http\Controllers;

// IMPORT
use Illuminate\Http\Request;

// MODEL
use App\Province;
use App\City;

class areaApiController extends Controller
{
    public function getCity()
    {
        $cities = City::where('province_id', request()->province_id)->get();
        return response()->json(['status' => 'success', 'data' => $cities]);
    }
}
