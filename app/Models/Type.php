<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'chapter_type',
        'chapter_description',
        'can_have',
    ];
}
