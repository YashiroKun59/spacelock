<?php

namespace Database\Factories;

use App\Models\Rental;
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
        $rental = Rental::all()->random();
        $user = $rental->user->id;
        $rental = $rental->id;
        return [
            'number'=>fake()->numberBetween(1,999),
            'message'=>fake()->sentence(30),
            'status'=>fake()->numberBetween(0,3),
            'from_manager'=>fake()->boolean(50),
            'enabled'=>fake()->boolean(90),
            'user_id'=>$user,
            'rental_id'=>$rental,
        ];
    }
}
