<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Support>
 */
class SupportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $manager = DB::table('managers')->count('id');
        $rental = DB::table('rentals')->count('id');
        return [
            'number'=>fake()->numberBetween(1,999),
            'message'=>fake()->sentence(30),
            'status'=>fake()->numberBetween(0,3),
            'from_manager'=>fake()->boolean(50),
            'enabled'=>fake()->boolean(90),
            'manager_id'=>fake()->numberBetween(1,$manager),
            'rental_id'=>fake()->numberBetween(1,$rental),
        ];
    }
}
