<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'status',
        'customer_id'
    ];
    public function payment(){
        return $this->hasOne(Payment::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'customer_id');
    }
    public function products(){
        return $this->morphToMany(Product::class,'productable')->withPivot('quantity');
    }
    public function getTotalAttribute(){
        return $this->products->pluck('total')->sum();
    }

}

