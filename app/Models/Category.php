<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $table = 'categories';

    protected $guarded = [];

    public function subjects(){
        return $this->hasMany(Subject::class, 'category_id');
    }

    public function models()
    {
        return $this->belongsToMany(_Model::class, 'category_model');
    }
}
