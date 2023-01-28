<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> fake()->lastName(),
            'firstname'=> fake()->firstName(),
            'address'=> fake()->address(),
            'zipcode'=> fake()->numberBetween(1000,9999),
            'city'=> fake()->city,
            'phone'=> fake()->phoneNumber(),
            'email'=> fake()->safeEmail(),
            'password'=> Hash::make(fake()->password()),
            'reset_password_token'=> 'SUPERSECRETTOKEN',
            'signing_count'=> fake()->numberBetween(0,999),
            'current_signing_ip'=> fake()->ipv4(),
            'last_signing_ip'=> fake()->ipv4(),
            'comment'=> fake()->sentence(10,true),
            'data_collection'=> fake()->boolean('50'),
            'enabled'=> fake()->boolean(90),
            'role_id'=>fake()->numberBetween(1,3),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
