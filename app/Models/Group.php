<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    
    protected $table = 'groups';

    protected $guarded = [];

    public function users(){
        // return $this->belongsTo(User::class, 'teacher_id');
    }
    public function subject1(){
        return $this->belongsTo(Subject::class, 'subject1_id');
    }
    public function subject2(){
        return $this->belongsTo(Subject::class, 'subject2_id');
    }
    public function subject3(){
        return $this->belongsTo(Subject::class, 'subject3_id');
    }

    public function user1(){
        return $this->belongsTo(User::class, 'user1_id');
    }
    public function user2(){
        return $this->belongsTo(User::class, 'user2_id');
    }
    public function user3(){
        return $this->belongsTo(User::class, 'user3_id');
    }
}
