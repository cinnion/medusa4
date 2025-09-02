<?php

namespace Database\Seeders;

use App\Models\AwardLog;
use Illuminate\Database\Seeder;

class AwardLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AwardLog::factory()
            ->count(10)
            ->create();

        AwardLog::factory()
            ->count(10)
            ->newer()
            ->create();
    }
}
