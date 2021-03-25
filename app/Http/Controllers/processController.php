<?php

namespace App\Http\Controllers;

// IMPORT
use Illuminate\Http\Request;
// MODEL
use App\Order;              
use App\Order_detail;        
use App\Courir;             
use App\Sector;             
use App\Delivery;           
use App\Customer;           
use App\Product;            
use App\Category;           


class processController extends Controller
{
    public function OrderProcessRequest($id)
    {
        $order = Order::with(['orderDetail'])->find($id);
        $chooseCourir = Courir::withcount([ 'delivery' => function($q){
            $q->where('delivery.status','=','Delivery');
        }])
        ->where('sector_id', $order->sector_id)
        ->sortBy(function($q)
        {
            $delivery = $q->delivery_count; 
            return $delivery;
        });

        return view('process.show', compact(['order','chooseCourir']));
    }


    public function OrderProcess(Request $request)
    {
        $order = Order::with('sector')->find($request->order_id);
        $courir = Courir::find($request->courir_id);
        $order->status = "Delivery";
        $order->save();

        $order_id = str_pad($order->id, 6, '0', STR_PAD_LEFT);
        $sector_code = $order->sector->sector_code;
        $courir_name = $courir->name;
        
        $delivery_code = substr($courir_name,0,3)."/".now()->format('Y-m-d')."/".$order_id."/".rand(1000000,9999999);
        
        $delivery = Delivery::create([
            'delivery_code' => $delivery_code, 
            'order_id' => $request->order_id,
            'courir_id' => $request->courir_id,
            'note' => $request->note,
            'delivery_date' => $order->delivery_date,
            'delivery_time' => $order->delivery_time,
            'invoice' => $order->invoice,
            'status' => "Delivery",
        ]);
    }


    public function checkedDetail($order_detail_id)
    {
        $detail = Order_detail::find($order_detail_id);
        $detail->checked = !$detail->checked;
        $detail->save();
    }


    public function completedDelivery($id)
    {
        $delivery = Delivery::find($id);
        $delivery->status = "Success";
        $delivery->save();

        $order = Order::find($delivery->order_id);
        $order->status = "Success";
        $order->save();
    }

}
