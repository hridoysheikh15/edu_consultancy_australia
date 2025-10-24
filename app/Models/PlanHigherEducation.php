<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanHigherEducation extends Model
{
    protected $fillable = [
        'title',
        'header',
        'card_header_one',
        'card_header_two',
        'card_header_three',
        'card_description_one',
        'card_description_two',
        'card_description_three',
    ];
}
