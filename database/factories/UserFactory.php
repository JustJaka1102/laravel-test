<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\user>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'user_name' => $this->faker->unique()->userName,
            'birthday' => $this->faker->date('Y-m-d', '2005-12-31'),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'password' => Hash::make('password'),
            'reset_password' => null,
            'status' => $this->faker->randomElement([0, 1, 3]),
            'flag_delete' => false,
        ];
    }
}
