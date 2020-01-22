<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductMedia extends Model
{

    protected $table = 'productmedias';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename','name', 'description', 'product_id', 'filetype', 'filename'
    ];

    public function products()
    {
      return $this->belongsToMany(Product::class,'product_productimage', 'product_id', 'productimage_id');
    }
}
