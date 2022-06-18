<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable=[
        'path',
        'products_id',
    ];
    public function product(){
        return $this->belongsTo(Product::class,'products_id');
    }

}