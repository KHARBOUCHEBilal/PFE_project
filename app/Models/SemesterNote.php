<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterNote extends Model
{
    use HasFactory;
    
    protected $table = 'semester_notes';

    protected $guarded = [];

    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }
}
