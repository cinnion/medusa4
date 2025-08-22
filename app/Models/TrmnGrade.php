<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class TrmnGrade extends Model
{
    /**
     * @var string Use the trmn_mongodb connection.
     */
    protected $connection = 'trmn_mongodb';

    /**
     * @var string Table name.
     */
    protected $table = 'grades';

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

    public static function dumpAsSeeder()
    {
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
     DB::table('grades')->insert([

EOD;

        $grades = TrmnGrade::select(['rank', 'grade'])->orderBy('grade')->get();

        foreach ($grades as $grade) {
            echo '            [' . PHP_EOL;
            echo '                \'grade\' => \'' . $grade['grade'] . '\',' . PHP_EOL;
            echo '                \'rank\' => [' . PHP_EOL;
            foreach ($grade['rank'] as $branch => $title) {
                echo '                    "' . $branch . '" => "' . $title . '",' . PHP_EOL;
            }
            echo '                 ],' . PHP_EOL;
            echo '            ],' . PHP_EOL;

        }
        echo <<< EOD
     ])
}
EOD;

    }
}
