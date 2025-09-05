<?php

namespace Database\Seeders;

use App\Models\Exam;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Exam::factory()->newer()->create(['member_id' => 'A0000002']);
        Exam::factory()->newer()->create(['member_id' => 'A0000005']);
    }
}
