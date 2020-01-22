<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;


class Vente extends Model
{
  use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */

      protected $table = 'ventes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'slug', 'name', 'description', 'date', 'horaires','productcategorie_id',
        'location_city','location_address','location_postalcode','location_state',
        'location_private_address', 'location_country', 'show_location', 'show_date',
        'content', 'fb_event_url', 'fb_pixel', 'meta_desc', 'color_code', 'is_public',
        'status'
    ];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */

    protected $guarded = ['id'];


    /**
     * Vente Products Relationships.
     *
     * @var array
     */

    public function products()
    {
      return $this->belongsToMany(Product::class);
    }

    /**
     * Vente Orders Relationships.
     *
     * @var array
     */

    public function orders()
    {
      return $this->belongsToMany(Order::class);
    }

    public function users()
    {
      return $this->belongsToMany(User::class);
    }
}
