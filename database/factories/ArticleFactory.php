<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name;

        return [
            'title' => $name,
            'slug' => Str::slug($name),
            "body" => fake()->text,
            'status' => fake()->boolean,
            "user_id" => random_int(1,10),
            "category_id" => random_int(1,20),
        ];
    }
}
