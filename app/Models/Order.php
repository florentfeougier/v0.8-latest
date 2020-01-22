<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vente;
use App\Models\User;
use App\Models\Deliverie;
use App\Models\Product;
use App\Models\Voucher;

class Order extends Model
{
  use SoftDeletes;
  

  protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'amount',
        'cart',
        'user_id',
        'payment_status',
        'status',
        'payment_id',
        'payment_method',
        'transaction_id',
        "customer_email",
        "state"
    ];

    public function ventes()
    {
      return $this->belongsToMany(Vente::class);
    }

    public function products()
    {
      return $this->belongsToMany(Product::class)->withPivot('quantity', 'price');
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function payments()
    {
      return $this->hasMany(Payment::class);
    }

    public function vouchers()
    {
      return $this->belongsToMany(Voucher::class);
    }

    public function deliverie()
    {
      return $this->hasOne(Deliverie::class);
    }
}
