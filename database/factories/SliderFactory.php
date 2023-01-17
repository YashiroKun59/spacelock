<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->realText(40),
            'subtitle' => fake()->realText(60),
            'media' => fake()->imageUrl(640,480,null,true),
            'uri' => fake()->url(),
            'timelaps' => fake()->boolean(50),
            'start_at' => fake()->date('Y-m-d'),
            'end_at' => fake()->date('Y-m-d','now'),
            'enabled' => fake()->boolean(50),
            //
        ];
    }
}
