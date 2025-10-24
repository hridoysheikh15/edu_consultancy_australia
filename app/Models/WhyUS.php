<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyUS extends Model
{
    protected $fillable =[
        'title',
        'header',
        'card_image_one',
        'card_image_two',
        'card_image_three',
        'card_image_four',
        'card_header_one',
        'card_header_two',
        'card_header_three',
        'card_header_four',
        'card_description_one',
        'card_description_two',
        'card_description_three',
        'card_description_four'
    ];
}
