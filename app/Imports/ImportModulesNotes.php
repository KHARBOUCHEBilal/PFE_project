<?php

namespace App\Imports;

use App\Models\ModulesNote;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportModulesNotes implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ModulesNote([
            'student_id' => User::where('CNE',$row[1])->get()->first()->id,
            'ro' => $row[5], //Recherche operationelle0
            'coo' => $row[6], //Conception oriente objet
            'reseaux' => $row[7], // Reseaux
            'compilation' => $row[8], // Compilation
            'poo' => $row[9], //Programmation oriente objet
            'db' => $row[10], //Base de donnee
            'moyenne' => $row[11], //Moyenne
            'status' => $row[12] //Valide or not valide
        ]);
    }
}
