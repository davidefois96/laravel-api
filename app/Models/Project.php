<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function type(){
       return $this->belongsTo(Type::class);
    }
    public function technologies(){
       return $this->belongsToMany(Technology::class);
    }

    protected $fillable = ['name','type_id', 'slug', 'description', 'image', 'image_original_name', ];
}
