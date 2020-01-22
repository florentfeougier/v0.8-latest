<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vente;
use App\Models\User;
use App\Models\Product;
class Page extends Model
{
  protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
        'thumbnail',
        'color_code',
        'is_public',
        'meta_title',
        'meta_desc',

    ];


}
