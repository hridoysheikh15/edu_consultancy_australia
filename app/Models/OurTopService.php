<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurTopService extends Model
{
    protected $fillable = [
        'image',
        'title',
        'header',
        'description',
        'sub_description'
    ];
}
