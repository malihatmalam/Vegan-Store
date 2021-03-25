<?php

namespace App\Http\Controllers;

// IMPORT
use Illuminate\Http\Request;
// DATATABLE
use DataTables;
// MODEL
use App\Courir;         
use App\Sector;          


class courirController extends Controller
{
    public function index()
    {
        $sector = Sector::orderBy('name', 'ASC')->get(); 
        $courir = Courir::with(['sector'])->get();

        return view('courirs.index', compact('courir', 'sector'));
    }

    
    public function indexData() 
    {
        $courir = Courir::with(['sector'])->select([
            'id',
            'name',
            'status',
            'created_at',
            'sector_id',
        ]);

        // Datatables 
        return DataTables::eloquent($courir)
        ->addColumn('sector_name', function (Courir $name) {
            return $name->sector->name;
        })
        ->addColumn('format_date_crt', function ($p){
            if ($p->created_at == ''){
                return $date = "Tanggal Belum Diisi";
            }
            $date = $p->created_at->format('d/m/Y'); 
            return $date ;  
        })
        ->addColumn('label_status', function ($p){
            if ($p->status == 'non-active') {
                return '<span class="badge badge-secondary">Tidak Aktif</span>';
            }
            return '<span class="badge badge-success">Aktif</span>';  
        })
        ->addColumn('action',function ($p){
            return '<td>
            <a data-toggle="modal" id="showButton" data-target="#showModal" 
                data-attr="/courir/'.$p->id.'" class="btn btn-info"  > View </a>
            <a href="/courir/'.$p->id.'/edit" class="btn btn-warning" > Edit </a>
            <a data-toggle="modal" id="deleteButton" data-target="#deleteModal" 
                data-attr="/courir/deleteConfirm/'.$p->id.'" class="btn btn-danger" > Delete </a>
            </td>';
        })
        ->rawColumns([
            'sector_name',
            'format_date_crt',
            'label_status',
            'action',
        ])
        ->toJson();
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'status' => 'required',
            'sector_id' => 'required|exists:sectors,id',
        ]);

        // Menyimpan Courir Baru
        $courir = new Courir;
        $courir->name = $request->name;
        $courir->status = $request->status;
        $courir->sector_id = $request->sector_id;
        $courir->save();

        return redirect(route('courir.index'))->with(['success' => 'Kurir Baru Ditambahkan']); 
    }


    public function show($id)
    {
        $courir = Courir::with('sector')->find($id);

        return view('courirs.show', compact('courir'));
    }

    
    public function edit($id)
    {

        $sector = Sector::orderBy('name', 'ASC')->get();
        $courir = Courir::with('sector')->find($id); 

        return view('courirs.edit', compact('courir','sector')); 
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'status' => 'required',
            'sector_id' => 'required|exists:sectors,id', 
        ]);
    
        // KEMUDIAN UPDATE PRODUK TERSEBUT
        $courir = Courir::find($id);
        $courir->name = $request->name;
        $courir->sector_id = $request->sector_id;
        $courir->status = $request->status;
        $courir->save();

        return redirect(route('courir.index'))->with(['success' => 'Data Kurir Diperbaharui']);
    }

    
    public function destroy($id)
    {
        $courir = Courir::find($id);
        $courir->delete();
        return redirect(route('courir.index'))->with(['success' => 'Kurir Dihapus!']);

    }
    
    
    public function destroyModal($id)
    {
        $courir = Courir::find($id); 
        return view('courirs.deleteModal', compact('courir')); 
    }
}
