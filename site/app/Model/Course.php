<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'course_title',
        'course_slug',
        'course_desc',
        'course_thumb',
        'total_enroll',
        'total_class',
        'course_fee',
        'course_link',
    ];
}