<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courseclassroom extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];
}
