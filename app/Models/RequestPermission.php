<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestPermission extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'requester_id',
        'author_id',
        'request',
         'status',
    ];

    public function project(){
        return $this->belongsTo(Project::class,'project_id','id');
    }
    public function requester(){
        return $this->belongsTo(User::class,'requester_id','id');
    }
}
