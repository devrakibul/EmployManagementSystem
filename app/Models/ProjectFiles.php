<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFiles extends Model
{
    use HasFactory;

    function projects() {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
