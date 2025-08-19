<?php

namespace App\Models;

use Laravel\Passport\AuthCode;
use MongoDB\Laravel\Eloquent\DocumentModel;

class MongoAuthCode extends AuthCode
{
    use DocumentModel;

    protected $primaryKey = '_id';
    protected $keyType = 'string';
}
