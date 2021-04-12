<?php

namespace App\Http\Controllers;

// IMPORT 
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// DATATABLE
use DataTables; 
// FILE  
use File;
// MODEL
use App\Order;              
use App\Delivery;        
use App\Courir;             

class deliveryController extends Controller
{
    public function index()
    {
         return view('deliveries.index');
    }
 
 
    public function indexDataDelivery() // Datatable Index Wait
    {
        $delivery = Delivery::where('status', 'Delivery')->with([
            'order',
            'courir',])
            ->select([
                'id',
                'invoice',
                'delivery_code',
                'order_id',
                'courir_id',
                'delivery_date',
                'delivery_time',
                'created_at',
        ]);

        // Datatables 
        return DataTables::eloquent($delivery)
        ->addColumn('format_date_delivery', function ($p){
            if ($p->created_at == ''){
                return $date = "Tanggal Belum Diisi";
            }
            $date = $p->created_at->format('d/m/Y'); 
            return $date ;  
        })
        ->addColumn('format_date_crt', function ($p){
            if ($p->created_at == ''){
                return $date = "Tanggal Belum Diisi";
            }
            $date = $p->created_at->format('d/m/Y'); 
            return $date ;  
        })
        ->addColumn('action',function ($p){
            return '<td>
            <a data-toggle="modal" id="showButton" data-target="#showModal" 
                data-attr="/delivery/'.$p->id.'" class="btn btn-info"  > View </a>
            <a data-toggle="modal" id="editButton" data-target="#editModal" 
                data-attr="/delivery/'.$p->id.'/edit" class="btn btn-warning" > Edit </a>
            <a data-toggle="modal" id="deleteButton" data-target="#deleteModal" 
                data-attr="/delivery/deleteConfirm/'.$p->id.'" class="btn btn-danger" > Delete </a>
            </td>';
        })
        ->rawColumns([
            'format_date_delivery',
            'format_date_crt',
            'action',
        ])
        ->toJson();
    }
    public function indexDataSuccess() // Datatable Index Success
    {
        $delivery = Delivery::where('status', 'Success')->with([
            'order',
            'courir',])
            ->select([
                'id',
                'invoice',
                'delivery_code',
                'order_id',
                'courir_id',
                'delivery_date',
                'delivery_time',
                'created_at',
        ]);

        // Datatables 
        return DataTables::eloquent($delivery)
        ->addColumn('format_date_delivery', function ($p){
            if ($p->created_at == ''){
                return $date = "Tanggal Belum Diisi";
            }
            $date = $p->created_at->format('d/m/Y'); 
            return $date ;  
        })
        ->addColumn('format_date_crt', function ($p){
            if ($p->created_at == ''){
                return $date = "Tanggal Belum Diisi";
            }
            $date = $p->created_at->format('d/m/Y'); 
            return $date ;  
        })
        ->addColumn('action',function ($p){
            return '<td>
            <a data-toggle="modal" id="showButton" data-target="#showModal" 
                data-attr="/delivery/'.$p->id.'" class="btn btn-info"  > View </a>

            <a data-toggle="modal" id="editButton" data-target="#editModal" 
                data-attr="/delivery/'.$p->id.'/edit" class="btn btn-warning" > Edit </a>

            <a data-toggle="modal" id="deleteButton" data-target="#deleteModal" 
                data-attr="/delivery/deleteConfirm/'.$p->id.'" class="btn btn-danger" > Delete </a>

            </td>';
        })
        ->rawColumns([
            'format_date_delivery',
            'format_date_crt',
            'action',
        ])
        ->toJson();
    }
    

    public function show($id)
    {
        $delivery = Delivery::with([
        'order',
        'courir',])
        ->find($id); 

        return view('deliveries.show', compact('delivery'));
    }

    public function edit($id)
    {
        $delivery = Delivery::find($id); 

        return view('deliveries.edit', compact('delivery'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required', 
        ]);

        // UPDATE DELIVERY 
        $delivery = Delivery::find($id);
        $delivery->status = $request->status;
        $delivery->note = $request->note;
        $delivery->save();

        return redirect(route('delivery.index'))->with(['success' => 'Data Pengiriman Telah Di Perbaharui']);
    }

    
    public function destroy($id)
    {
        $delivery = Delivery::find($id);
        $delivery->delete();
        
        return redirect(route('delivery.index'))->with(['success' => 'Pengiriman Telah Dihapus']);
    }


    public function destroyModal($id)
    {
        $delivery = Delivery::find($id); 
        return view('deliveries.deleteModal', compact('delivery')); 
    }
}
