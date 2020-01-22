<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Deliverie extends Model
{
  use SoftDeletes;


  protected $table = 'deliveries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'deliverie_id',
        'pickup_id',
        'pickup_name',
        'pickup_address',
        'pickup_postalcode',
        'pickup_city',
        'location_name',
        'city',
        'postalcode',
        'country',
        'status',
        'completed',
        'tracking_id',
        'shipment_tracking_url',
        'shipment_sticker_url',

    ];

    public function user()
    {
      return $this->belongsTo(Order::class);
    }

    public function order()
    {
      return $this->belongsTo(Order::class);
    }

}
