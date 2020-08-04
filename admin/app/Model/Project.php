<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'project_name',
        'project_slug',
        'project_desc',
        'project_link',
        'project_thumb',
    ];
}
