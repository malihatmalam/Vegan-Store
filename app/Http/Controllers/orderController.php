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
use App\Order_detail;        
use App\Customer;             
use App\Sector;             


class orderController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }


    public function indexDataWait() // Datatable Index Wait
    {
        $order = Order::where('status', 'Wait')->with([
            'customer',
            'sector',
            'orderDetail'])
            ->select([
                'id',
                'invoice',
                'customer_name',
                'total_item',
                'total',
                'delivery_date',
                'detailSector_name',
                'sector_id',
                'created_at',
        ]);

        // Datatables 
        return DataTables::eloquent($order)
        ->addColumn('format_total_item', function ($p){
            $total_item = $p->total_item." Item"; 
            return $total_item;  
        })
        ->addColumn('format_total', function ($p){
            return "Rp ".number_format($p->total,2,',','.');  
        })
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
                data-attr="/order/'.$p->id.'" class="btn btn-info"  > View </a>
            <a data-toggle="modal" id="editButton" data-target="#editModal" 
                data-attr="/order/'.$p->id.'/edit" class="btn btn-warning" > Edit </a>
            <a data-toggle="modal" id="deleteButton" data-target="#deleteModal" 
                data-attr="/order/deleteConfirm/'.$p->id.'" class="btn btn-danger" > Delete </a>
            </td>';
        })
        ->rawColumns([
            'format_total_item',
            'format_total',
            'format_date_delivery',
            'format_date_crt',
            'action',
        ])
        ->toJson();
    }
    public function indexDataSuccess() // Datatable Index Success
    {
        $order = Order::where('status', 'Success')->with([
            'customer',
            'sector',
            'orderDetail'])
            ->select([
                'id',
                'invoice',
                'customer_name',
                'total_item',
                'total',
                'delivery_date',
                'detailSector_name',
                'sector_id',
                'created_at',
        ]);

        // Datatables 
        return DataTables::eloquent($order)
        ->addColumn('format_total_item', function ($p){
            $total_item = $p->total_item." Item"; 
            return $total_item;  
        })
        ->addColumn('format_total', function ($p){
            return "Rp ".number_format($p->total,2,',','.');  
        })
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
                data-attr="/order/'.$p->id.'" class="btn btn-info"  > View </a>
            <a data-toggle="modal" id="editButton" data-target="#editModal" 
                data-attr="/order/'.$p->id.'/edit" class="btn btn-warning" > Edit </a>
            <a data-toggle="modal" id="deleteButton" data-target="#deleteModal" 
                data-attr="/order/deleteConfirm/'.$p->id.'" class="btn btn-danger" > Delete </a>
            </td>';
        })
        ->rawColumns([
            'format_total_item',
            'format_total',
            'format_date_delivery',
            'format_date_crt',
            'action',
        ])
        ->toJson();
        

    }
    public function indexDataDelivery() // Datatable Index Delivery
    {
        $order = Order::where('status', 'Delivery')->with([
            'customer',
            'sector',
            'orderDetail'])
            ->select([
                'id',
                'invoice',
                'customer_name',
                'total_item',
                'total',
                'delivery_date',
                'detailSector_name',
                'sector_id',
                'created_at',
        ]);

        // Datatables 
        return DataTables::eloquent($order)
        ->addColumn('format_total_item', function ($p){
            $total_item = $p->total_item." Item"; 
            return $total_item;  
        })
        ->addColumn('format_total', function ($p){
            return "Rp ".number_format($p->total,2,',','.');  
        })
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
                data-attr="/order/'.$p->id.'" class="btn btn-info"  > View </a>
            <a data-toggle="modal" id="editButton" data-target="#editModal" 
                data-attr="/order/'.$p->id.'/edit" class="btn btn-warning" > Edit </a>
            <a data-toggle="modal" id="deleteButton" data-target="#deleteModal" 
                data-attr="/order/deleteConfirm/'.$p->id.'" class="btn btn-danger" > Delete </a>
            </td>';
        })
        ->rawColumns([
            'format_total_item',
            'format_total',
            'format_date_delivery',
            'format_date_crt',
            'action',
        ])
        ->toJson();
    }
    

    public function show($id)
    {
        $order = Order::with([
        'customer',
        'sector',
        'orderDetail.product'])
        ->find($id); 

        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::find($id); 

        return view('orders.edit', compact('order'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required', 
        ]);

        // UPDATE ORDER 
        $order = Order::find($id);
        $order->status = $request->status;
        $order->note = $request->note;
        $order->save();

        return redirect(route('order.index'))->with(['success' => 'Status Order telah diperbaharui dan di Ubah menjadi '.$order->status]);
    }

    
    public function destroy($id)
    {
        $order = Order::with([
            'orderDetail'])
            ->find($id);
        $order->orderDetail()->delete();
        $order->delivery()->delete();
        $order->delete();

        return redirect(route('order.index'))->with(['success' => 'Pesanan Telah Dihapus']);
    }
    
    
    public function destroyModal($id)
    {
        $order = Order::find($id); 
        return view('orders.deleteModal', compact('order')); 
    }
}
