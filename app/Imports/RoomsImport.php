<?php

namespace App\Imports;

use App\Models\Room;
use Maatwebsite\Excel\Concerns\ToModel;

class RoomsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Room([
            //
        ]);
    }
}
