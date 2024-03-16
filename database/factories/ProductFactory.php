<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'brand' => $this->faker->company(),
            'price' => $this->faker->randomFloat(2, 10, 1000), // رقم عشوائي بين 10 و 1000 بنقطة عشرية
            'sale' => $this->faker->boolean(30), // قيمة بولية عشوائية (true أو false) بنسبة 30% فقط
            'title' => $this->faker->sentence(),
            //'image_id' => function () {
            //    return \App\Models\Image::factory()->create()->id;
            //},
            'category' => $this->faker->word(),
            'desc' => $this->faker->paragraph(),
            'rate' => $this->faker->numberBetween(1, 5), // رقم عشوائي بين 1 و 5
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
