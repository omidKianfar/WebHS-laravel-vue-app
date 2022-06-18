<?php

namespace App;
use App\Image;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'title',
        'image_path',
        'description',
        'price',
        'stock',
        'status'
    ];
    public function images(){
        return $this->hasMany(Image::class,'products_id');
    }
    public function carts(){
        return $this->morphedByMany(Cart::class,'productable')->withPivot('quantity');
    }
    public function orders(){
        return $this->morphedByMany(Order::class,'productable')->withPivot('quantity');
    }
    public function getTotalAttribute(){
        return $this->pivot->quantity * $this->price;
    }
    public function scopeAvailable($query){
        return $query->where('status','available');
    }
}
