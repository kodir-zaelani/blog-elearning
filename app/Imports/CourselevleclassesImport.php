<?php

namespace App\Imports;

use App\Models\Courselevelclass;
use Maatwebsite\Excel\Concerns\ToModel;

class CourselevleclassesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Courselevelclass([
            //
        ]);
    }
}
