<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    public function levelclass()
    {
        return $this->belongsTo(Levelclass::class);

    }

    public function department()
    {
        return $this->belongsTo(Department::class);

    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
