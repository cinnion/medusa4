<?php

namespace App\Models;

use Laravel\Passport\DeviceCode;

class MongoDeviceCode extends DeviceCode
{
    protected $primaryKey = '_id';
    protected $keyType = 'string';
}
