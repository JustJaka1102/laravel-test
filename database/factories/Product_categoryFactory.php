<?php

namespace Database\Factories;

use App\Models\Product_category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product_category>
 */
class Product_categoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word, 
            'parent_id' => null, 
        ];
    }
    public function withParent(){
        return $this->states(function(){
            return [
                'parent_id' => Product_category::query()
                    ->inRandomOrder()
                    ->whereNull('parent_id')
                    ->value('id')
            ];
        });
    }
}
