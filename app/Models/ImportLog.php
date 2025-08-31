<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ImportLog extends Model
{
    protected $fillable = [
        'source',
        'msg'
    ];
}
