<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Tig extends Model
{
    protected $fillable = [
        'grade',
        'tig',
    ];

    protected $table = 'tig';
}
