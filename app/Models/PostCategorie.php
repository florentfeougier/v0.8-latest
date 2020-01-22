<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


use App\Models\Post;


class PostCategorie extends Model
{


  public $timestamps = false;
  protected $table = 'postcategories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'color_code',
        'shop_enable',

    ];

    public function posts()
    {
      return $this->belongsToMany(Post::class);
    }

}
