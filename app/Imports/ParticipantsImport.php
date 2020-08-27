<?php

namespace App\Imports;

use App\Models\Participant;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ParticipantsImport implements ToModel, WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Participant([
            // 'event_id' => $this->idevent,
            'event_id' => 1,
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
            'status_dprd' => $row[10],
            'jabatan_dprd' => $row[11],
            'address' => $row[12],
            'rt' => $row[13],
            'district' => $row[14],
            'vilage' => $row[15],
            'city' => $row[16],
            'postalcode' => $row[17],
            'statuspeserta' => $row[18],
        ]);
    }
}
