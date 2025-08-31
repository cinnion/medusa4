<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ExamList extends Model
{

    protected $fillable = [
        'exam_id',
        'name',
        'enabled',
    ];

    protected $table = 'exam_list';
}
