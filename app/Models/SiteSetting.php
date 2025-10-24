<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'logo',
        'favicon',
        'country_code',
        'number',
        'email',
        'address',
        'facebook',
        'instagram',
        'linkedin',
        'whatsapp',
    ];
}
