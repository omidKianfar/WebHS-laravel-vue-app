<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
   protected $fillable=[
    'user_id',
    'image',
    'name',
    'family',
    'phoneNumber',
    'address'
   ];
   public function user()
    {
        return $this->belongsTo(User::class);
    }
}
