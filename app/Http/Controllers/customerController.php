<?php

namespace App\Http\Controllers;

// IMPORT
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// DATATABLE
use DataTables;
// MODEL
use App\Customer; 
use App\Sector;
// FILE
use File;



class customerController extends Controller
{
    public function index()
    {
        $customer = Customer::with(['sector'])->orderBy('created_at', 'DESC')->paginate(10);

        return view('customers.index', compact('customer')); 

    }


    public function indexData()
    {
        $customer = Customer::with(['sector'])->select([
            'id',
            'name',
            'email',
            'status',
            'address',
            'sector_id',
            'phone',
            'balance',
            'point',
            'image',
            'created_at',
        ]);

        // Datatables 
        return DataTables::eloquent($customer)
        ->addColumn('format_balance', function ($p){
            return "Rp ".number_format($p->balance,2,',','.');  
        })
        ->addColumn('format_phone', function ($p){
            $phoneFormat = "+62".$p->phone; 
            return $phoneFormat;  
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
            if ($p->status == 'Buatan Admin') {
                return '<span class="badge badge-warning">Buatan Admin</span>';
            }
            return '<span class="badge badge-success">Aktif</span>';  
        })
        ->addColumn('action',function ($p){
            return '<td>
            <a data-toggle="modal" id="showButton" data-target="#showModal" 
                data-attr="/customer/'.$p->id.'" class="btn btn-info"  > View </a>
            <a data-toggle="modal" id="editButton" data-target="#editModal" 
                data-attr="/customer/'.$p->id.'/edit" class="btn btn-warning" > Edit </a>
            <a data-toggle="modal" id="deleteButton" data-target="#deleteModal" 
                data-attr="/customer/deleteConfirm/'.$p->id.'" class="btn btn-danger" > Delete </a>
            </td>';
        })
        ->rawColumns([
            'format_balance',
            'format_phone',
            'format_date_crt',
            'label_status',
            'action',
        ])
        ->editColumn('sector.code',  function ($p){
            if ($p->sector_id == ''){
                return $sector_code = "Belum Diisi";
            } 
            return $p->sector->code ;  
        })
        ->toJson();
    }


    public function create()
    {
        $sector = Sector::orderBy('name', 'DESC')->get();

        return view('customers.create', compact('sector'));

    }


    public function store(Request $request) // Khusus Admin
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:customers', 
            // 'password' => 'required|string',
            // 'status' => 'required', 
            'sector_id' => 'required|exists:sectors,id',  
        ]);

        // Create Customer
        $customer = new Customer;
        $customer -> name = $request->name;
        $customer -> email = $request->email;
        $customer -> password = Str::random(4).time().Str::random(4);
        $customer -> status = 'Buatan Admin';
        $customer -> sector_id = $request->sector_id;
        $customer -> phone = '8'.rand(0000000000,9999999999);
        $customer -> balance = 0;
        $customer -> point = 0;
        $customer->save();

        return redirect(route('customer.index'))->with(['success' => 'Customer Baru Ditambahkan']); 
    }


    public function show($id)
    {
        $customer = Customer::with(['sector'])->find($id);

        return view('customers.show', compact('customer'));
    }

    
    public function edit($id)
    { 
        $sector = Sector::orderBy('name', 'DESC')->get();
        $customer = Customer::with(['sector'])->find($id);

        return view('customers.edit', compact('customer','sector'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'required', 
            // 'password' => 'required|string',
            // 'status' => 'required', 
            'sector_id' => 'required|exists:sectors,id', 
        ]);

        // UPDATE CUSTOMER
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->sector_id = $request->sector_id;
        $customer->status = $request->status;
        $customer->save();

        return redirect(route('customer.index'))->with(['success' => 'Data Customer Diperbaharui']);
    }


    public function destroy($id)
    {
        $customer = Customer::find($id);
        File::delete('customers/' . $customer->image);
        $customer->delete();

        return redirect(route('customer.index'))->with(['success' => 'Customer Telah Dihapus']);
    }

    
    public function destroyModal($id)
    {
        $customer = Customer::find($id); 
        return view('customers.deleteModal', compact('customer')); 
    }
}
