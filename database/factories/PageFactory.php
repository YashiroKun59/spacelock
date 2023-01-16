<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->realText(30),
            'slug' => fake()->slug(4,true),
            'content' => fake()->realText(700),
            'author' => fake()->name(),
            'description' => fake()->realText(70),
            'keywords' => fake()->words(3,true),
            'enabled' => fake()->boolean(90),
        ];
    }
}
