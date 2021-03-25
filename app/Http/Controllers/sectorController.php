<?php

namespace App\Http\Controllers;

// IMPORT
use Illuminate\Http\Request;

// MODEL
use App\Sector;
use App\Sector_detail;
use App\Province;
use App\City;
use DataTables;

class sectorController extends Controller
{
    public function index()
    { 
        $province = Province::orderBy('id', 'ASC')->get();
        $sector = Sector::with(['sector_detail'])->orderBy('name', 'ASC')->get(); 

        return view('sectors.index', compact('sector', 'province'));
    }


    public function indexData() // Datatable Index
    {
        $sector = Sector::with(['sector_detail'])->selectRaw('distinct sectors.*');;

        // Datatables 
        return DataTables::eloquent($sector)
        ->addColumn('action',function ($p){
            return '<td>
            <a data-toggle="modal" id="showButton" data-target="#showModal" 
                data-attr="/sector/'.$p->id.'" class="btn btn-info"  > View </a>
            <a data-toggle="modal" id="editButton" data-target="#editModal" 
                data-attr="/sector/'.$p->id.'/edit" class="btn btn-warning" > Edit </a>
            <a data-toggle="modal" id="deleteButton" data-target="#deleteModal" 
                data-attr="/sector/deleteConfirm/'.$p->id.'" class="btn btn-danger" > Delete </a>
            </td>';
        })
        ->addColumn('format_date_crt', function ($p){
            if ($p->created_at == ''){
                return $date = "Tanggal Belum Diisi";
            }
            $date = $p->created_at->format('d/m/Y'); 
            return $date ;  
        })
        ->addColumn('area', function (Sector $s) {
            return $s->sector_detail->map(function($s_detail) {
                return $s_detail->name;
            })->implode('; ');
        })
        ->rawColumns([
            'action',
            'format_date_crt',
            'area',
        ])
        ->toJson();
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:sectors',
            'code' => 'required|string|max:3|unique:sectors',
            'city_id' => 'required|exists:cities,id',
        ]);

        // CREATE SECTOR 
        $sector = Sector::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        $city = City::find($request->city_id);

        $sector_detail = new Sector_detail;
        $sector_detail->sector_id = $sector->id;
        $sector_detail->city_id = $request->city_id;
        $sector_detail->name = $city->type.' '.$city->name;
        $sector_detail->save();

        return redirect(route('sector.index'))->with(['success' => 'Sector Baru Ditambahkan']); 
    }


    public function show($id)
    {
        $sector = Sector::with('sector_detail')->find($id); 
        return view('sectors.show', compact('sector'));     
    }
    // Datatable Sector_detail berada di sector detail controller

    
    public function edit($id)
    {
        $sector = Sector::with('sector_detail')->find($id); 

        return view('sectors.edit', compact('sector')); 
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name_edit' => 'required|string',
            'code_edit' => 'required|string|max:3', 
        ]);
    
        // KEMUDIAN UPDATE PRODUK TERSEBUT
        $sector = Sector::find($id);
        $sector->update([
            'name' => $request->name_edit,
            'code' => $request->code_edit,
        ]);

        return redirect(route('sector.index'))->with(['success' => 'Data Sector Diperbaharui']);
    }

    
    public function destroy($id)
    {
        $sector = Sector::withCount(['sector_detail'])->find($id);
        if ($sector->sector_detail_count == 0) {
            $sector->delete();
        
            return redirect(route('sector.index'))->with(['success' => 'Sector Dihapus!']);
        }

        return redirect(route('sector.index'))->with(['error' => 'Sector Ini Memiliki Area !!!, Hapus dahulu areanya.']);
    }


    public function destroyModal($id)
    {
        $sector = Sector::find($id); 
        
        return view('sectors.deleteModal', compact('sector')); 
    }
}
