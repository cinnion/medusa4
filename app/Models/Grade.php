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

    public static function getRankTitle(string $grade, ?string $rate = null, string $branch = 'RMN'):  string
    {
        if (is_null($rate) === true && $branch == 'CIVIL') {
            $rate = 'DIPLOMATIC';
        } elseif (is_null($rate) === true && $branch == 'RMMM') {
            $rate = 'CATERING';
        }

        $gradeDetails = self::where('grade', '=', $grade)->first();

        $rateDetail = Rating::where('rate_code', '=', $rate)->first();

        if (empty($gradeDetails->rank[$branch]) === false) {
            $rank_title = self::mbTrim($gradeDetails->rank[$branch]);
        } else {
            $rank_title = $grade;
        }

        if (empty($rateDetail->rate[$branch][$grade]) === false) {
            $rank_title = $rateDetail->rate[$branch][$grade];
        }

        return $rank_title;
    }

    /**
     * Trim whitespace from mb_strings.
     *
     * @param $string
     * @param string $trim_chars
     *
     * @return mixed
     */
    private static function mbTrim($string, $trim_chars = '\s')
    {
        return preg_replace('/^['.$trim_chars.']*(?U)(.*)['.$trim_chars.']*$/u', '\\1', $string);
    }
}
