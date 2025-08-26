<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

/**
 * Class Award.
 *
 * @property int display_order
 * @property string name
 * @property string code
 * @property string post_nominal
 * @property string replaces
 * @property string location
 * @property bool multiple
 * @property string group_label
 * @property float points
 * @property string branch
 * @property string image
 * @property string star_nation
 * @property \MongoDB\BSON\UTCDateTime created_at
 * @property \MongoDB\BSON\UTCDateTime updated_at
 */
class Award extends Model
{
    protected $fillable = [
        'display_order',
        'name',
        'code',
        'post_nominal',
        'replaces',
        'location',
        'multiple',
        'group_label',
        'points',
        'branch',
        'image',
        'star_nation',
    ];

    /**
     * Get the awards for the specified uniform location.
     *
     * @param $location
     * @param string[] $limit
     *
     * @return Award[]
     */
    public static function _getAwards($location, array $limit = []): array
    {
        $awards = [];

        $query = self::where('location', $location);

        if (count($limit) > 0) {
            $query = $query->whereIn('code', $limit);
        }

        $results = $query->orderBy('display_order')->get();

        foreach ($results as $ribbon) {
            $awards[$ribbon->code] = $ribbon;
        }

        $ribbons = [];

        foreach ($awards as $code => $ribbon) {
            if (isset($awards[$code]) === true) {
                if (empty($ribbon->replaces) === true) {
                    $ribbons[] = $ribbon;
                } else {
                    // Only one of these ribbons are allowed
                    $tmp = [$ribbon];
                    $multiple = false;

                    foreach (explode(',', $ribbon->replaces) as $item) {
                        if (empty($awards[$item]) === false) {
                            $tmp[] = $awards[$item];

                            if ($awards[$item]->multiple === true) {
                                $multiple = true;
                            }

                            unset($awards[$item]);
                        }
                    }

                    $ribbons[] = [
                        'group' => [
                            'label' => $ribbon->group_label,
                            'awards' => $tmp,
                            'multiple' => $multiple,
                        ],
                    ];
                }
            }
        }

        return $ribbons;
    }

    /**
     * Get any a list of all Aerospace Wings.
     *
     * @param array $limit
     *
     * @return array
     * @todo Refactor to use the config table
     */
    public static function getAerospaceWings(array $limit)
    {
        if (empty($limit)) {
            $limit = [
                'SAW',
                'EAW',
                'OAW',
                'ESAW',
                'OSAW',
                'EMAW',
                'OMAW',
                'ENW',
                'ONW',
                'ESNW',
                'OSNW',
                'EMNW',
                'OMNW',
                'EOW',
                'OOW',
                'ESOW',
                'OSOW',
                'EMOW',
                'OMOW',
                'ESW',
                'OSW',
                'ESSW',
                'OSSW',
                'EMSW',
                'OMSW',
            ];
        }

        return self::_getAwards('TL', $limit);
    }

    /**
     * Get the ribbons that go on the left side of the uniform.
     *
     * @return array
     */
    public static function getLeftRibbons()
    {
        return self::_getAwards('L');
    }

    /**
     * Get the ribbons that go on the right side of the uniform.
     *
     * @return array
     */
    public static function getRightRibbons()
    {
        return self::_getAwards('R');
    }

    /**
     * Get the qualification badges that go above the ribbons.
     *
     * @param array $limit
     *
     * @return array
     */
    public static function getTopBadges(array $limit = [])
    {
        return self::_getAwards('TL', $limit);
    }

    /**
     * Get left sleeve items, such as HMS Unconquered.
     *
     * @return array
     */
    public static function getLeftSleeve()
    {
        return self::_getAwards('LS');
    }

    /**
     * Get the right sleeve stripes.
     *
     * @return array
     */
    public static function getRightSleeve()
    {
        return self::_getAwards('RS');
    }

    /**
     * Get the Army Weapons Qualification Badges.
     *
     * @return array
     */
    public static function getArmyWeaponQualificationBadges()
    {
        return self::_getAwards('AWQ');
    }

    /**
     * Get the display order for an award.
     *
     * @param string $code
     *
     * @return int|null
     */
    public static function getDisplayOrder(string $code): int|null
    {
        return self::where('code', $code)->first()?->display_order;
    }

    /**
     * Get the award by its code.
     *
     * @param string $code
     *
     * @return Award|null
     */
    public static function getAwardByCode(string $code): Award|null
    {
        return self::where('code', '=', $code)->first();
    }

    /**
     * Get the points for an award.
     *
     * @param string $code
     *
     * @return float|null
     */
    public static function getPointsForAward(string $code): float|null
    {
        return self::where('code', $code)->first()?->points;
    }

    /**
     * Get the name of the award.
     *
     * @param string $code
     *
     * @return string|null
     */
    public static function getAwardName(string $code): string|null
    {
        return self::where('code', $code)->first()?->name;
    }

    /**
     * Get the name of the image to use for the award.
     *
     * @param string $code
     *
     * @return string|null
     */
    public static function getAwardImage(string $code): string|null
    {
        return self::where('code', $code)->first()?->image;
    }

    /**
     * Update the award display order for an award.
     *
     * @param string $code
     * @param int $display_order
     *
     * @return bool
     */
    public static function updateDisplayOrder(string $code, int $display_order): bool
    {
        try {
            $award = self::where('code', $code)->firstOrFail();
            $award->display_order = $display_order;

            $award->save();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
