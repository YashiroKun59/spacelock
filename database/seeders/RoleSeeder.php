<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        # role
        #empty the table to avoid duplicate
        #Role::query()->truncate();

        Role::factory()->create([
            'name' => 'admin',
            'logo' => fake()->imageUrl(400,400,null),
            'enabled' => true,
        ]);
        Role::factory()->create([
            'name' => 'manager',
            'logo' => fake()->imageUrl(400,400,null),
            'enabled' => true,
        ]);
        Role::factory()->create([
            'name' => 'customer',
            'logo' => fake()->imageUrl(400,400,null),
            'enabled' => true,
        ]);
        # end role
    }
}
