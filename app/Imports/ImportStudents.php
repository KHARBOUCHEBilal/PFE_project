<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportStudents implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        return new User([
            'nom' => $row[3],
            'prenom' => $row[4],
            'CNI' => $row[2],
            'CNE' => $row[1],
            'studentCode' => $row[0],
            'email' => $row[2] . '@gmail.com',
            'password' => Hash::make($row[2]),
            'user_type' => 'student',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
