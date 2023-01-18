<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username'=>fake()->uudi(),
            'lastname'=> fake()->lastName(),
            'firstname'=> fake()->firstName(),
            'address'=> fake()->address(),
            'zipcode'=> fake()->numberBetween(1000,9999),
            'city'=> fake()->city,
            'phone'=> fake()->phoneNumber(),
            'email'=> fake()->safeEmail(),
            'password'=> fake()->password(),
            'reset_password_token'=> 'SUPERSECRETTOKEN',
            'signing_count'=> fake()->numberBetween(0,999),
            'current_signing_ip'=> fake()->ipv4(),
            'last_signing_ip'=> fake()->ipv4(),
            'comment'=> fake()->sentence(10,true),
            'data_collection'=> fake()->boolean('50'),
            'enabled'=> fake()->boolean(90),
        ];
    }
}
