<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Grade extends Model
{
    /**
     * @var string[]  Fields that can be set.
     */
    protected $fillable = [
        'grade',
        'rank',
    ];

    /**
     * @var string[] List of prefixes for the grade.
     */
    public static $gradeFilters = [
        'P' => 'Provisional',
        'E' => 'Enlisted',
        'W' => 'Warrant Officer',
        'O' => 'Officer',
        'F' => 'Flag Officer',
        'C' => 'Civilian',
    ];
}
