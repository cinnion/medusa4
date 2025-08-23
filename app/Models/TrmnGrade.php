<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

/**
 * @codeCoverageIgnore
 */
class TrmnGrade extends Grade
{
    /**
     * @var string Use the trmn_mongodb connection.
     */
    protected $connection = 'trmn_mongodb';

    /**
     * @var string Table name.
     */
    protected $table = 'grades';

    protected static function cleanupNbsp(string $original): string
    {
        $new = str_replace("\xa0", " ", $original);
        $new = str_replace("\xc2", " ", $new);
        $new = str_replace("  ", " ", $new);
        return trim($new);
    }

    protected static $sortOrder = [
        'P',
        'MID',
        'E',
        'WO',
        'O',
        'F',
        'C',
    ];

    protected static function gradeSort(array $a, array $b) {
        $aParts = explode('-', $a['grade']);
        $bParts = explode('-', $b['grade']);

        $aIndex = array_search($aParts[0], static::$sortOrder);
        $bIndex = array_search($bParts[0], static::$sortOrder);

        if ($aIndex < $bIndex) {
            return -1;
        } elseif ($aIndex == $bIndex) {
            if ((int)$aParts[1] == (int) $bParts[1]) {
                if (isset($aParts[2]) && isset($bParts[2])) {
                    return ($aParts[2] < $bParts[2]) ? -1 : 1;
                } elseif (isset($aparts[1])) {
                    return -1;
                } else {
                    return 1;
                }
            } else {
                return ((int)$aParts[1] < (int)$bParts[1]) ? -1 : 1;
            }
        } else {
            return 1;
        }
    }

    public static function dumpAsSeeder()
    {
        $grades = TrmnGrade::select(['rank', 'grade'])->orderBy('grade')->get()->toArray();

        usort($grades, [TrmnGrade::class, 'gradeSort'] );

        echo <<< EOD
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grades')->insert([

EOD;

        foreach ($grades as $grade) {
            echo '            [' . PHP_EOL;
            echo '                \'grade\' => \'' . $grade['grade'] . '\',' . PHP_EOL;
            echo '                \'rank\' => [' . PHP_EOL;
            foreach ($grade['rank'] as $branch => $title) {
                echo '                    "' . $branch . '" => "' . static::cleanupNbsp($title) . '",' . PHP_EOL;
            }
            echo '                ],' . PHP_EOL;
            echo '            ],' . PHP_EOL;

        }
        echo <<< EOD
        ]);
    }
}
EOD;

    }
}
