<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rental>
 */
class RentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $customer = DB::table('customers')->count('id');
        $space = DB::table('spaces')->count('id');
        return [
            'start_at'=>fake()->dateTime(),
            'end_at'=>fake()->dateTime(),
            'bill_period'=>fake()->numberBetween(30,365),
            'contrat_url'=>fake()->url(),
            'enabled'=>fake()->boolean(90),
            'customer_id'=>fake()->numberBetween(1,$customer),
            'space_id'=>fake()->numberBetween(1,$space),
        ];
    }
}
