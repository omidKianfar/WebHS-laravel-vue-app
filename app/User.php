<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Order;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

// class User extends Authenticatable implements MustVerifyEmail
class User extends Authenticatable

{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'name',
        'family',
        'address',
        'phoneNumber',
        'email',
        'password',
        'type',
    ];
    protected $casts = [
        'email_verified'=> 'datetime',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function profile(){
        return $this->hasOne(Profile::class);
    }
    public function orders(){
        return $this->hasMany(Order::class,'customer_id');
    }
    public function payments(){
        return $this->hasManyThrough(Payment::class,Order::class,'customer_id');
    }

}
