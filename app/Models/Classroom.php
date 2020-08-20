<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Expr\FuncCall;

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
}
