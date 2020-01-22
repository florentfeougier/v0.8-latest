<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use App\Models\Order;
use App\Models\Product;
use App\Models\Payment;

class User extends Authenticatable
{
    use HasRoleAndPermission;
    use Notifiable;
    use SoftDeletes;
    use MustVerifyEmail;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'activated',
        'token',
        'signup_ip_address',
        'signup_confirmation_ip_address',
        'signup_sm_ip_address',
        'admin_ip_address',
        'updated_ip_address',
        'deleted_ip_address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'activated',
        'token',
    ];

    protected $dates = [
        'deleted_at',
    ];

    /**
     * Build Social Relationships.
     *
     * @var array
     */
    public function social()
    {
        return $this->hasMany('App\Models\Social');
    }

    /**
     * User Profile Relationships.
     *
     * @var array
     */


    /**
     * User Profile Relationships.
     *
     * @var array
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * User Profile Relationships.
     *
     * @var array
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * User Profile Relationships.
     *
     * @var array
     */
    public function ventes()
    {
        return $this->belongsToMany(Vente::class);
    }


    /**
     * User Profile Relationships.
     *
     * @var array
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    // User Profile Setup - SHould move these to a trait or interface...

    public function profiles()
    {
        return $this->hasOne('App\Models\Profile')->withTimestamps();
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function hasProfile($name)
    {
        foreach ($this->profiles as $profile) {
            if ($profile->name == $name) {
                return true;
            }
        }

        return false;
    }

    public function assignProfile($profile)
    {
        return $this->profiles()->attach($profile);
    }

    public function removeProfile($profile)
    {
        return $this->profiles()->detach($profile);
    }
}

