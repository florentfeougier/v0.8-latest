<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductLabel extends Model
{


    protected $table = 'productlabels';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug','name', 'color_code'
    ];

    public function products()
    {
          return $this->hasMany(Product::class, 'productlabel_id');

    }
}
