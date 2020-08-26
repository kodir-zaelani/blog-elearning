<?php

namespace App\Imports;

use App\Models\Participant;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;

class ParticipantsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Participant([
            'event_id' => $this->event,
            'nik' => $row[0],
            'name' => $row[1],
            'slug' => Str::random(8),
            'birthplace' => $row[2],
            'dateofbirth' => $row[3],
            'gender' => $row[4],
            'religion' => $row[5],
            'no_hp' => $row[6],
            'no_wa' => $row[7],
            'email' => $row[8],
            'jabatan_dpc' => $row[9],
            'jabatan_dprd' => $row[10],
            'rt' => $row[11],
            'district' => $row[12],
            'vilage' => $row[13],
            'city' => $row[14],
            'postalcode' => $row[15],
        ]);
    }
}
