<?php

namespace App\Http\Controllers;

// IMPORT
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// DATATABLES
use DataTables;
// FILE  
use File;
// MODEL 
use App\Category;        
use App\Product;        


class categoryController extends Controller
{
    
    public function index()
    {     
        $category = Category::orderBy('created_at', 'DESC')->paginate(10);
        
        return view('categories.index', compact('category'));
    }
    

    public function indexData()
    {
        $category = Category::select([
            'id',
            'name',
            'description',
            'created_at',
            ]);
 
        return DataTables::eloquent($category)
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
                data-attr="/category/'.$p->id.'" class="btn btn-info"  > View </a>
            <a href="/category/'.$p->id.'/edit" class="btn btn-warning" > Edit </a>
            <a data-toggle="modal" id="deleteButton" data-target="#deleteModal" 
                data-attr="/category/deleteConfirm/'.$p->id.'" class="btn btn-danger" > Delete </a>
            </td>';
        })
        ->rawColumns([
            'format_date_crt',
            'action',
        ])
        ->toJson();
    }


    public function store(Request $request)
    { 
        $this->validate($request, [
            'name' => 'required|string|max:50|unique:categories',
            'image' => 'required|mimes:png,jpeg,jpg',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file
            ->getClientOriginalExtension();
            $file->move('categories', $filename);  

            // FIELD slug AKAN DITAMBAHKAN KEDALAM COLLECTION $REQUEST
            $request->request->add(['slug' => $request->name]);
        
            Category::create([          
                'name' => $request->name,
                'slug' => $request->name,
                'description' => $request->description,
                'image' => $filename,
            ]);
            return redirect(route('category.index'))->with(['success' => 'Kategori Telah Ditambahkan']);
        }
    }


    public function show($id)
    {
        $category = Category::find($id); 
        return view('categories.show', compact('category')); 
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50'
        ]);
        $category = Category::find($id);
        $filename = $category->image; 
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move('categories', $filename);
            File::delete('categories/' . $category->image);
        }

        // Update Data Category
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $filename;
        $category->save();

        return redirect(route('category.index'))->with(['success' => 'Kategori Diperbaharui!']);
    }

    
    public function destroy($id)
    {
        $category = Category::withCount(['product'])->find($id); 
        if ($category->product_count == 0) {
            File::delete('categories/' . $category->image);
            $category->delete();
            return redirect(route('category.index'))->with(['success' => 'Kategori Dihapus!']);
        }
        return redirect(route('category.index'))->with(['error' => 'Kategori Ini Memiliki Product!']);
    }


    public function destroyModal($id)
    {
        $category = Category::find($id);
        return view('categories.deleteModal', compact('category')); 
    }

    //MUTATOR : untuk memodifikasi data sebelum data sebelum
    //data disimpan ke dalam database. 
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    //ACCESSOR : formating dilakukan setelah data diterima dari database. 
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
