<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function classroom()
    {
        return $this->hasMany(Classroom::class);
    }
}
