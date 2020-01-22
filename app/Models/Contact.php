<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;


class Contact extends Model
{
  use SoftDeletes;

      protected $table = 'contacts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 
        'name', 
        'email',
        'message',
        'ip_addr',
    ];


    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
