<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyDestination extends Model
{
    protected $fillable = [
        'section_one_header',
        'section_one_description',
        'section_one_image',
        'section_two_header',
        'section_two_description',
        'section_three_header',
        'section_three_description',
        'section_three_image',
        'section_four_header',
    ];
}
