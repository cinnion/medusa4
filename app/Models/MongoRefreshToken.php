<?php

namespace App\Models;

use Laravel\Passport\RefreshToken;

class MongoRefreshToken extends RefreshToken
{
    protected $primaryKey = '_id';
    protected $keyType = 'string';
}
