<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $guarded = [];

    // Category - Product (One to Many)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Product - Order Detail (One to Many)
    public function orderDetail()
    {
        return $this->hasMany(Order_detail::class);
    }

    //INI ADALAH ACCESSOR, JADI KITA MEMBUAT KOLOM BARU BERNAMA STATUS_LABEL
    //KOLOM TERSEBUT DIHASILKAN OLEH ACCESSOR, MESKIPUN FIELD TERSEBUT TIDAK ADA DITABLE PRODUCTS
    //AKAN TETAPI AKAN DISERTAKAN PADA HASIL QUERY
    public function getStatusLabelAttribute()
    {
        //ADAPUN VALUENYA AKAN MENCETAK HTML BERDASARKAN VALUE DARI FIELD STATUS
        if ($this->status == 'draft') {
            return '<span class="badge badge-secondary">Draft</span>';
        }
        else {
            return '<span class="badge badge-success">Aktif</span>';
        }
    }

    //SEDANGKAN INI ADALAH MUTATORS, PENJELASANNYA SAMA DENGAN ARTIKEL SEBELUMNYA
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value); 
    }

    // FORMAT HARGA 
    public function formatRupiah($value)
    {
        return "Rp ".number_format($buku->harga,2,',','.');
    }
}
