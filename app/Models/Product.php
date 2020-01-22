<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vente;
use App\Models\Order;
use App\Models\Fiche;
use App\Models\Box;
use App\Models\User;
use App\Models\ProductImage;
use App\Models\ProductLabel;
use App\Models\ProductCategorie;


class Product extends Model{

  use SoftDeletes;


    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'sku', 'name', 'price', 'old_price', 'stock', 'thumbnail', 'store_enabled',
        'specs', 'description', 'tax', 'sold', 'meta_title', 'meta_desc', 'weight', 'height',
        'productcategorie_id', 'productlabel_id', 'picture_one', 'picture_two', 'video'
    ];

    public function ventes()
    {
      return $this->belongsToMany(Vente::class);
    }

    public function boxes()
    {
      return $this->belongsToMany(Box::class);
    }

    public function orders()
    {
      return $this->belongsToMany(Order::class)->withPivot('quantity', 'price');
    }

    public function fiches()
    {
      return $this->belongsToMany(Fiche::class);
    }

    public function users()
    {
      return $this->belongsToMany(User::class);
    }


    public function productcategorie()
    {
        return $this->belongsTo(ProductCategorie::class);
    }

    public function productmedias()
    {
        return $this->belongsToMany(ProductMedia::class, 'product_productmedia', 'product_id', 'productmedia_id');
    }

    public function productlabel()
    {
        return $this->belongsTo(ProductLabel::class);

    }

}
