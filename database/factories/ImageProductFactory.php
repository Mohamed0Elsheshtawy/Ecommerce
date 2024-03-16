<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\ImageProduct;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ImageProductFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected $model = ImageProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'path' => fake()->image(),
            //'default_imge' => fake()->image(),
            'product_id' => function () {
                return \App\Models\ImageProduct::factory()->create()->id;
            },
            'image_id' => function () {
                return \App\Models\ImageProduct::factory()->create()->id;
            },
            //'email' => fake()->unique()->safeEmail(),
            //'email_verified_at' => now(),
            //'password' => static::$password ??= Hash::make('password'),
            //'remember_token' => Str::random(10),
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
