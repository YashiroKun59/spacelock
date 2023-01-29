<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Space>
 */
class SpaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $site=DB::table('sites')->count('id');
        $price=DB::table('prices')->count('id');
        $spacetype=DB::table('spacetypes')->count('id');
        return [

            'nickname'=>fake()->name(),
            'description'=>fake()->text(120),
            'picture'=> fake()->imageUrl(400,400),
            'length'=>fake()->numberBetween(100,800),
            'width'=>fake()->numberBetween(100,800),
            'height'=>fake()->numberBetween(100,800),
            'enabled'=>fake()->boolean(90),
            'site_id'=>fake()->numberBetween(1,$site),
            'spacetype_id'=>fake()->numberBetween(1,$spacetype),
            'price_id'=>fake()->numberBetween(1,$price),
        ];
    }
}
