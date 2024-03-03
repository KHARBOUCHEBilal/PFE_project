<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    protected $table = 'subjects';

    protected $guarded = [];

    public function teacher(){
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }


}
