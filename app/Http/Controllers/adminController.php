<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// DATATABLE
use DataTables;
// MODEL 
use App\Order;            
use App\Order_detail;        
use App\Customer;             
use App\Sector;   
use App\Courir; 
use App\Delivery; 

class adminController extends Controller
{
    public function dashboard()
    {
        
        return view('dashboards.index');
    }
    public function orderData()
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
                'delivery_time',
                'detailSector_name',
                'sector_id',
                'scheduled',
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
        ->addColumn('format_scheduled', function ($p){
            if ($p->scheduled == true){
                return $sched = "Berlangganan";
            }
            $sched = "Sekali Beli"; 
            return $sched;  
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
            <a href="/process/'.$p->id.'" class="btn btn-info"> 
                Proses 
            </a>
            </td>';
        })
        ->rawColumns([
            'format_total_item',
            'format_total',
            'format_date_delivery',
            'format_date_crt',
            'format_scheduled',
            'action',
        ])
        ->toJson();
    }
    
    public function deliveryData()
    {
        $delivery = Delivery::where('status', 'Delivery')
            ->select([
                'id',
                'invoice',
                'delivery_code',
                'delivery_date',
                'delivery_time',
                'status',
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
            <a data-toggle="modal" id="deliveryButton" data-target="#deliveryModal" data-attr="/delivery_success/'.$p->id.'" class="btn btn-success"> 
                Selesai 
            </a>
            
            </td>';
        })
        ->addColumn('label_status', function ($p){
            if ($p->status == 'Delivery') {
                return '<span class="badge badge-info">Sedang Dikirim</span>';
            }
            return '<span class="badge badge-success">Sukses</span>';  
        })
        ->rawColumns([
            'format_date_delivery',
            'format_date_crt',
            'label_status',
            'action',
        ])
        ->toJson();
    }
    
    public function praProcess($id)
    {
        $order = Order::with([
            'customer',
            'sector',
            'orderDetail.product'])
            ->find($id); 
        $courir = Courir::where('sector_id', $order->sector_id)->get();
    
        return view('dashboards.process', compact('order','courir'));
    }

    public function process( Request $request, $id )
    {
        $this->validate($request, [
            'courir' => 'required', 
        ]);

        $order = Order::find($id); 
        $order->status = "Delivery";
        $order->save();

        $courir = Courir::find($request->courir);

        $delivery_code = substr($order->customer_name,0,3).'/'.now()->format('Y-m-d').'/'.substr($courir->name,0,3).'/'.rand(10000,99999);

        $delivery = new Delivery;
        $delivery->order_id = $order->id;
        $delivery->courir_id = $request->courir;
        $delivery->delivery_code = $delivery_code;
        $delivery->invoice = $order->invoice;
        $delivery->status = "Delivery";
        $delivery->delivery_date = $order->delivery_date;
        $delivery->delivery_time = $order->delivery_time;
        $delivery->note = $request->delivery_note;
        $delivery->save();
    
        return redirect(route('dashboard'))->with(['success' => 'Pesanan Telah Diproses, dan Saat ini sedang Dikirim']);
    }
    
    public function modalDeliverySuccess($id)
    {
        $delivery = Delivery::find($id);
        return view('dashboards.deliveryModal', compact('delivery'));
    }

    public function deliverySuccess($id)
    {
        $delivery = Delivery::find($id); 
        $delivery->status = "Success";
        $delivery->save();

        $order = Order::find($delivery->order_id);
        $order->status = "Success";
        $order->save();

        return redirect(route('dashboard'))->with(['success_delivery' => 'Pesanan Telah Diterima, dan Pengiriman Sukses']);
    }
    
}
