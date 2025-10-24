<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $fillable = [
        'image',
        'header_one',
        'description_one',
        'header_two',
        'description_two',
    ];

}
