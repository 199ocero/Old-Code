<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'instruction',
        'url',
    ];

    public function projectCategory(){
        return $this->hasMany(ProjectCategory::class);
    }
    public function requestPermission(){
        return $this->hasMany(RequestPermission::class);
    }
}
