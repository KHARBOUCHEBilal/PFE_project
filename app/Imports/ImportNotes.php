<?php

namespace App\Imports;

use App\Models\ModulesNote;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportNotes implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ModulesNote([
           'student_id' => User::where('CNE',$row[0])->get()->first()->id,
           'programation2' => $row[1],
           'structures_de_donnees' => $row[2],
           'systeme_dexploitation2' => $row[3],
           'analyse_numerique' => $row[4],
           'archetecture_des_ordinateurs' => $row[5],
           'electromagnetisme' => $row[6],
        ]);
    }
}
