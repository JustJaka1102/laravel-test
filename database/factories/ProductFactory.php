<?php

namespace Database\Factories;

use App\Models\Product_category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'stock' => $this->faker->numberBetween(0, 10000),
            'expired_at' => $this->faker->dateTimeBetween('now', '+1 year'), 
            'avatar' => 'image_not_found.jpg', 
            'sku' => Str::upper(Str::random(10)), 
            'category_id' => Product_category::inRandomOrder()->first()->id ?? null,
        ];
    }
}
