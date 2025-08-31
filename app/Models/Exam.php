<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'member_id',
        'exams'
    ];
}
