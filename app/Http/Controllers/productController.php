<?php

namespace App\Http\Controllers;

// IMPORT
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// DATATABLE
use DataTables;
// MODEL
use App\Product; 
use App\Category;
// FILE
use File;


class productController extends Controller
{
    public function index()
    {
        return view('products.index'); 
    }


    public function indexData() // Datatable Index
    {
        $products = Product::select('products.*');
        $product = Product::with(['category'])->select([
            'id',
            'name',
            'description',
            'price',
            'typeunit',
            'status',
            'created_at',
            'category_id',
        ]);

        // Datatables 
        return DataTables::eloquent($product)
        ->addColumn('format_price', function ($p){
            return "Rp ".number_format($p->price,2,',','.');  
        })
        ->addColumn('label_status', function ($p){
            if ($p->status == 'draft') {
                return '<span class="badge badge-secondary">Draft</span>';
            }
            return '<span class="badge badge-success">Publish</span>';  
        })
        ->addColumn('action',function ($p){
            return '<td>
            <a data-toggle="modal" id="showButton" data-target="#showModal" 
                data-attr="/product/'.$p->id.'" class="btn btn-info"  > View </a>
            <a data-toggle="modal" id="editButton" data-target="#editModal" 
                data-attr="/product/'.$p->id.'/edit" class="btn btn-warning inline" > Edit </a>
            <a data-toggle="modal" id="deleteButton" data-target="#deleteModal" 
                data-attr="/product/deleteConfirm/'.$p->id.'" class="btn btn-danger inline" > Delete </a>
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
            'format_price',
            'label_status',
            'action',
            'format_date_crt',
        ])
        ->toJson();
    }

    
    public function create()
    { 
        $category = Category::orderBy('name', 'DESC')->get();

        return view('products.create', compact('category'));
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'image' => 'required|image|mimes:png,jpeg,jpg', 
            'price' => 'required|integer',
            'typeunit' => 'required|string',
            'status' => 'required',
            'category_id' => 'required|exists:categories,id', 
        ]);

        //JIKA FILENYA ADA
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move('products', $filename);

            // CREATE PRODUCT 
            $product = Product::create([
                'name' => $request->name,
                'slug' => $request->name,
                'description' => $request->description,
                'image' => $filename, 
                'price' => $request->price,
                'typeunit' => $request->typeunit,
                'status' => $request->status,
                'category_id' => $request->category_id,
            ]);

            return redirect(route('product.index'))->with(['success' => 'Produk Baru Ditambahkan']);
        }
    }


    public function show($id)
    {
        $product = Product::with(['category'])->find($id); 
        return view('products.show', compact('product'));         
    }

    
    public function edit($id)
    {
        $product = Product::find($id); 
        $category = Category::orderBy('name', 'DESC')->get(); 
        
        return view('products.edit', compact('product', 'category'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:png,jpeg,jpg', 
            'price' => 'required|integer',
            'typeunit' => 'required|string',
            'status' => 'required',
            'category_id' => 'required|exists:categories,id', 
        ]);

        $product = Product::find($id); 
        $filename = $product->image; 

        //JIKA ADA FILE GAMBAR YANG DIKIRIM
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move('products', $filename);
            File::delete('products/' . $product->image);
        }
    
        // UPDATE PRODUK 
        $product->update([
            'name' => $request->name,
            'slug' => $request->name,
            'description' => $request->description,
            'image' => $filename, 
            'price' => $request->price,
            'typeunit' => $request->typeunit,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ]);

        return redirect(route('product.index'))->with(['success' => 'Data Produk Diperbaharui']);
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        File::delete('products/' . $product->image);
        $product->delete();

        return redirect(route('product.index'))->with(['success' => 'Produk Sudah Dihapus']);
    }

    
    public function destroyModal($id)
    {
        $product = Product::find($id); 
        return view('products.deleteModal', compact('product')); 
    }
    

    public function formatDateCreate()
    {
        return format('d/m/Y');
    }
}
