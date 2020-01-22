<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductCategorie extends Model
{

    protected $table = 'productcategories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug','name', 'description',
    ];

    public function products()
    {
      return $this->hasMany(Product::class, 'productcategorie_id');
    }
}
