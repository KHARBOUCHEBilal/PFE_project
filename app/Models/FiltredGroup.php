<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiltredGroup extends Model
{
    use HasFactory;
    
    protected $table = 'filtred_groups';

    protected $guarded = [];

    public $timestamps = false;

    public function Subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function group(){
        return $this->belongsTo(Group::class, 'group_id');
    }
}
