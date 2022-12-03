<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImages extends Model
{
    use HasFactory;
    protected $fillable = ['project_id', "image"];

    function projects() {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
