<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulesNote extends Model
{
    use HasFactory;
    
    protected $table = 'modules_notes';

    protected $guarded = [];

    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }
}
