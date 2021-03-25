<?php

namespace App\Http\Controllers;

// IMPORT 
use Illuminate\Http\Request;
// DATATABLE
use DataTables;
// MODEL 
use App\Sector;
use App\Sector_detail;
use App\Province;
use App\City;

class sectorDetailController extends Controller
{
    public function indexData($id) // Datatable Index
    {
        $sectorDetail = Sector_detail::find($id)->select([
            'id',
            'name',
            'sector_id',
            'city_id',
            'created_at',
            ]);

        // Datatables 
        return DataTables::eloquent($sectorDetail)
        ->addColumn('action',function ($p){
            return '<td>            
            <a data-toggle="modal" id="editButton" data-target="#editModal" 
                data-attr="/sectorDetail/'.$p->id.'/edit" class="btn btn-warning" > Edit </a>
            <a data-toggle="modal" id="deleteButton" data-target="#deleteModal" 
                data-attr="/sectorDetail/deleteConfirm/'.$p->id.'" class="btn btn-danger" > Delete </a>
            </td>';
        })
        ->addColumn('format_date_crt', function ($p){
            if ($p->created_at == ''){
                return $date = "Tanggal Belum Diisi";
            }
            $date = $p->created_at->format('d/m/Y'); 
            return $date ;  
        })
        ->rawColumns([
            'action',
            'format_date_crt',
        ])
        ->toJson();
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'sector_id_detail' => 'required|exists:sectors,id',
            'city_id_detail' => 'required|exists:cities,id|unique:sector_details,city_id',
        ]);

        $city = City::find($request->city_id_detail);

        $sector = Sector::with(['sector_detail'])->find($request->sector_id_detail);
        $sectorCheck = Sector::with('sector_detail')->get();
        $name = $city->type.' '.$city->name;
        

        $sector_detail = new Sector_detail;
        $sector_detail->sector_id = $request->sector_id_detail;
        $sector_detail->city_id = $request->city_id_detail;
        $sector_detail->name = $name;
        $sector_detail->save();

        return redirect(route('sector.index'))->with(['success' => 'Penambahan Area Baru di Sector : '.$sector->name.', Telah Sukses' ]);      
    }


    public function edit($id)
    {
        $province = Province::orderBy('id', 'ASC')->get();
        $sector = Sector::orderBy('name', 'ASC')->get(); 
        $sector_detail = Sector_detail::find($id);
        
        return view('sector_details.edit', compact('province', 'sector', 'sector_detail')); //LOAD VIEW DAN PASSING DATANYA KE VIEW
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sector_id' => 'required|exists:sectors,id',
        ]);

        $sector = Sector::find($request->sector_id);

        $sector_detail = Sector_detail::find($id);
        $sector_detail-> sector_id = $request->sector_id;
        $sector_detail->save(); 

        return redirect(route('sector.index'))->with(['success' => 'Area di Sector : '.$sector->name.', Telah Sukses Diperbaharui']);
    }


    public function destroy($id)
    {
        $sector_detail = Sector_detail::find($id); 
        $sector = Sector::find($sector_detail->sector_id);
        $sector_detail->delete();
        
        return redirect(route('sector.index'))->with(['success' => 'Area di Sector : '.$sector->name.', Telah Sukses Dihapus']);
    }

    
    public function destroyModal($id)
    {
        $sector_detail = Sector_detail::find($id); //AMBIL DATA CATEGORY TERKAIT BERDASARKAN ID
        return view('sectors.deleteModal', compact('sector_detail')); //LOAD VIEW DAN PASSING DATANYA KE VIEW
    }
}
