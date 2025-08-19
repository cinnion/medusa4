<?php

namespace App\Models;

use Laravel\Passport\Token;

class MongoToken extends Token
{
    protected $primaryKey = '_id';
    protected $keyType = 'string';
}
