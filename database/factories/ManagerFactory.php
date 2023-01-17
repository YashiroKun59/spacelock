<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manager>
 */
class ManagerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lastname'=>fake()->lastName(),
            'firstname'=>fake()->firstName(),
            'avatar'=>fake()->imageUrl(200,200,null),
            'phone'=>fake()->phoneNumber(),
            'email'=>fake()->safeEmail(),
            'password'=>fake()->password(),
            'reset_password_token'=> 'SUPERSECURETOKEN',
            'signing_count'=>fake()->numberBetween(0,999),
            'current_signing_ip'=>fake()->ipv4(),
            'last_signing_ip'=>fake()->ipv4(),
            'enabled'=>fake()->boolean(90),
        ];
    }
}
