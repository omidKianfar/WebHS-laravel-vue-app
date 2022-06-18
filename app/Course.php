<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=[
        'image',
        'title',
        'description',
        'image_path'
    ];
}
