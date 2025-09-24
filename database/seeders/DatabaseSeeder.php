<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            AwardSeeder::class,
            BranchSeeder::class,
            BilletSeeder::class,
            ChapterSeeder::class,
            ExamListSeeder::class,
            GradeSeeder::class,
            MedusaConfigSeeder::class,
            RatingSeeder::class,
            UserSeeder::class,
        ]);
    }
}
