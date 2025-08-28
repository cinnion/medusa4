<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $grades = [
            'E-1',
            'E-2',
            'E-3',
            'E-4',
            'E-5',
            'E-6',
            'E-7',
            'E-8',
            'E-9',
            'E-10',
            'W-1',
            'W-2',
            'W-3',
            'W-4',
            'W-5',
            'O-1',
            'O-2',
            'O-3',
            'O-4',
            'O-5',
            'O-6',
            'F-1',
            'F-2',
            'F-3',
            'F-4',
            'F-5',
            'F-6',
        ];

        $registration_status = [
            'Pending',
            'Active',
            'Denied'
        ];

        return [
            'email_address' => fake()->unique()->safeEmail(),
            'email_verified_at' => null,
            'password' => static::$password ??= Hash::make('password123'),
            'remember_token' => Str::random(10),

            'rank' => [
                'grade' => $this->faker->randomElement($grades),
                'date_of_rank' => fake()->dateTimeBetween('-2 year')->format('Y-m-d'),
            ],
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->optional()->firstName(),
            'last_name' => fake()->lastName(),
            'suffix' => null,
            'address1' => fake()->streetAddress(),
            'address2' => null,
            'city' => fake()->city(),
            'state' => 'VA',
            'postal_code' => fake()->postcode(),
            'country' => fake()->countryCode(),
            'phone_number' => fake()->optional()->phoneNumber(),

            'dob' => fake()->dateTimeBetween('-60 year')->format('Y-m-d'),
            'application_date' => fake()->dateTimeBetween('-2 year')->format('Y-m-d'),
            'registration_date' => fake()->optional()->dateTimeBetween('-2 year')?->format('Y-m-d'),
            'registration_status' => $this->faker->randomElement($registration_status),
            'member_id' => fake()->optional()?->unique()?->numerify('RMN-####-##'),
            'promotion_status' => fake()->boolean(20),
            'points' => fake()->numerify('###'),

            'awards' => [],
            'history' => [],
            'assignment' => [],
            'peerages' => [],
            'permissions' => [
                'LOGOUT',
                'CHANGE_PWD',
                'EDIT_SELF',
                'ROSTER',
                'TRANSFER',
            ],

            'last_update' => fake()->dateTimeBetween()?->getTimestamp(),
            'previous_login' => null,
            'last_login' => null,
            'forum_last_login' => fake()->optional()->dateTimeBetween()?->getTimestamp(),
            'osa' => fake()->optional()->dateTimeBetween('-1 year', 'now')?->format("Y-m-d H:i:s"),
            'tos' => false,
            'active' => 0,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
