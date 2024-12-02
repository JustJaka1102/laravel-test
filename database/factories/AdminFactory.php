<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => 'admin@gmail.com',
            'user_name' => 'admin',
            'birthday' => $this->faker->date('Y-m-d', '2005-12-31'),
            'first_name' => 'admin',
            'last_name' => 'admin',
            'password' => Hash::make('123'),
            'reset_password' => null,
            'status' => '3',
            'flag_delete' => false,
        ];
    }
}
