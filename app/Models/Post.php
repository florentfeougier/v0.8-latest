<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\PostCategorie;

class Post extends Model
{


  protected $table = 'posts';

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
        'image',
        'duration',
        'difficulty',
	'meta_title',
	'meta_desc'
    ];

    public function postcategorie()
    {
      return $this->belongsTo(PostCategorie::class);
    }
}
