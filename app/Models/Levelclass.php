<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Levelclass extends Model
{
    protected $guarded = [];

     //hasMany ke table atau Model Post
     public function classroom()
     {
         return $this->hasMany(Classroom::class);
     }
}
