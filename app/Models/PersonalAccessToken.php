<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    protected $fillable = ['name', 'token', 'abilities', 'last_used_at'];

    protected $casts = [
        'abilities' => 'array',
    ];
}