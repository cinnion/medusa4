<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    /**
     * Get a list of ratings for the branch specified.
     *
     * @param string $branchID Branch ID to get ratings for
     *
     * @return array Array of ratings for the branch specified
     */
    public static function getRatingsForBranch(string $branchID): array
    {
        $results = self::all();
        $ratings = [];

        foreach ($results as $rating) {
            if (isset($rating->rate[$branchID]) == true &&
                empty($rating->rate[$branchID]) === false) {
                $ratings[$rating->rate_code] =
                    $rating->rate['description'].' ('.$rating->rate_code.')';
            }
        }

        asort($ratings, SORT_NATURAL);

        if (count($ratings) > 0) {
            switch ($branchID) {
                case 'RMMM':
                    $ratings = ['' => 'Select a Division'] + $ratings;
                    break;
                case 'CIVIL':
                    $ratings = ['' => 'Select a Specialty'] + $ratings;
                    break;
                default:
                    $ratings = ['' => 'Select a Rating'] + $ratings;
            }
        } else {
            $ratings = ['' => 'No ratings available for this branch'];
        }

        return $ratings;
    }

    /**
     * Get the name of the rate for the rate code specified.
     *
     * @param string $rateCode Rate code to get the name for
     *
     * @return string|bool Name of the rate for the rate code specified or false if not found
     */
    public static function getRateName(string $rateCode): string|bool
    {
        try {
            $rating = self::where('rate_code', $rateCode)->firstOrFail();

            return $rating->rate['description'];
        } catch (ModelNotFoundException $e) {
            return false;
        }
    }

    /**
     * Is the pay grade specified valid for the branch and rating provided.
     *
     * @param string $paygrade Pay grade to check
     * @param string $branch   Branch to check
     * @param string $rating   Rating to check
     *
     * @return bool True if the pay grade is valid for the branch and rating, false otherwise
     */
    public static function isPayGradeValid(string $paygrade, string $branch, string $rating): bool
    {
        try {
            $rateInfo = self::where('rate_code', $rating)->firstOrFail();

            return isset($rateInfo->rate[$branch][$paygrade]);
        } catch (ModelNotFoundException $e) {
            // Rating doesn't exist
            return false;
        }
    }
}
