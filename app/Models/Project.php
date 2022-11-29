<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    function project_image() {
        return $this->hasMany(ProjectImages::class, 'project_id');
    }

    function files() {
        return $this->hasMany(ProjectFiles::class, 'project_id');
    }

    function project_member() {
        return $this->hasMany(ProjectMembers::class, 'project_id');
    }
}
