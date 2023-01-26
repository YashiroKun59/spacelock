<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site>
 */
class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::all()->where('role_id','=',2)->random()->id;
        return [
            'name'=>fake()->name(),
            'lat'=>fake()->latitude(),
            'lon'=>fake()->longitude(),
            'description'=>fake()->sentence(10,true),
            'phone'=>fake()->phoneNumber(),
            'email'=>fake()->safeEmail(),
            'adress'=>fake()->address(),
            'zipcode'=>fake()->numberBetween(1000,9999),
            'city'=>fake()->city(),
            'picture'=>fake()->imageUrl(640,480,null),
            'enabled'=>fake()->boolean(90),
            'user_id'=>$user,
        ];
    }
}
