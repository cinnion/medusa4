<?php

namespace Database\Factories;

use App\Models\Award;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AwardLog>
 */
class AwardLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::whereNotNull('member_id')->get()->random();
        $award = Award::all()->random();

        return [
            'timestamp' => $this->faker->dateTimeBetween('-1 year', '-1 month'),
            'member_id' => $user->member_id,
            'award' => $award->code,
            'qty' => $award->multiple ? $this->faker->numberBetween(1,5) : 1,
        ];
    }

    public function newer(): static
    {
        return $this->state(fn (array $attributes) => [
            'timestamp' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ]);
    }
}
