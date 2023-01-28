<?php

namespace Database\Factories;

use App\Models\Option;
use App\Models\Space;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Optionspace>
 */
class OptionspaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $option_id = Option::all()->random();
        $space_id = Space::all()->count();
        return [
            'option_id' => $option_id,
            'space_id' => fake()->unique()->numberBetween(1,$space_id),
            'available' => 1,
        ];
    }
}
