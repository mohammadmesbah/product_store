<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
        $product_name= $this->faker->unique()->words($nb=2, $asText=true);
        $slug= Str::slug($product_name);
        return [
            'name' => Str::title($product_name),
            'slug' => $slug,
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(10,500),
            'SKU'=> $this->faker->numberBetween(100,500),
            'stock_status'=> 'instock',
            'quantity'=> $this->faker->numberBetween(100,200),
            'image_one' => $this->faker->numberBetween(1,24).'.jpg',
            'image_two' => $this->faker->numberBetween(1,24).'.jpg',
            'category_id'=> $this->faker->numberBetween(1,5),
            'brand_id'=> $this->faker->numberBetween(1,5),
        ];
    }
}
