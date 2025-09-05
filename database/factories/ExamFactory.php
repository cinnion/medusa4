<?php

namespace Database\Factories;

use App\Models\ExamList;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $exam = ExamList::all()->random();
        $randomDateTime = $this->faker->dateTimeBetween('-1 year', '-2 months');

        return [
            'member_id' => $this->faker->numerify('A#######'),
            'exams' => [
                $exam->exam_id => [
                    'score' => '100%',
                    'date' => $randomDateTime->format('Y-m-d'),
                    'date_entered' => $this->faker->dateTimeBetween($randomDateTime, 'now')->format('Y-m-d')
                ]
            ]
        ];
    }

    public function newer(): static
    {
        return $this->state(function (array $attributes) {
            $randomDateTime = $this->faker->dateTimeBetween('-2 weeks', 'now');
            $key = array_keys($attributes['exams'])[0];
            return [
                'exams' => [
                    $key => [
                        'date' => $randomDateTime->format('Y-m-d'),
                        'date_entered' => $this->faker->dateTimeBetween($randomDateTime, 'now')->format('Y-m-d'),
                    ]
                ]
            ];
        });
    }
}
