<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Rating extends Model
{
    /**
     * @var string[]  Fields that can be set.
     */
    protected $fillable = [
        'rate_code',
        'rate',
    ];
}
