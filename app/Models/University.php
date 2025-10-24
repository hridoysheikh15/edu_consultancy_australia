<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
        'image',
        'banner',
        'header_one',
        'header_two',
        'sub_title',
        'course_header',
        'course_sub_title',
    ];

}
