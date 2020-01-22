<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;


class Fiche extends Model
{
  use SoftDeletes;

      protected $table = 'fiches';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'description','description_short',
         'content', 'lumiere_info', 'color_code', 'entretien_info',
        'arrosage_info', 'thumbnail', 'meta_desc', 'meta_title'
    ];


    public function products()
    {
      return $this->belongsToMany(Product::class);
    }
}
