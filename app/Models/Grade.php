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

    /**
     * Get the requirements for a given paygrade from the config.
     *
     * @param string $paygrade2check The paygrade to check
     *
     * @return array The requirements for the specified paygrade
     */
    public static function getRequirements(string $paygrade2check): array
    {
        $requirements = MedusaConfig::get('pp.requirements');

        return $requirements[$paygrade2check];
    }
}
