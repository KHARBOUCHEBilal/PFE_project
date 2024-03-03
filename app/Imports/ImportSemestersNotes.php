<?php

namespace App\Imports;

use App\Models\SemesterNote;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportSemestersNotes implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SemesterNote([
                'student_id' => User::where('CNE',$row[0])->get()->first()->id,
                'S1' => $row[1],
                'S2' => $row[2],
                'S3' => $row[3],
                'S4' => $row[4],
                'S5' => $row[5],
                'S6' => $row[6],
        ]);
    }
}
