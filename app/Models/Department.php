<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

     //hasMany ke table atau Model Post
     public function classroom()
     {
         return $this->hasMany(Classroom::class);
     }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
