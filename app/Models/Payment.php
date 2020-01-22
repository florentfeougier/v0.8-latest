<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Order;
use App\Models\Product;
use App\Models\Payment;

class Payment extends Model
{
  use SoftDeletes;

  protected $table = 'payments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id',
        'ref_id',
        'amount',
        'order_id',
        'status',
        'auth_number',
        'payment_method',
        'transaction_number',
        'user_id',
        'call_number',
        'response_code',
        'info'

    ];



    public function order()
    {
      return $this->belongsTo(Order::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

}
