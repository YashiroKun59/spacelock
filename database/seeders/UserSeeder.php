<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // demo account
        User::factory()->create([
            'name' => 'administrateur',
            'email' => 'admin@exemple.lan',
            'password' => Hash::make('changeme'),
            'role_id' => 1,
        ]);
        User::factory()->create([
            'name' => 'manager',
            'email' => 'manager@exemple.lan',
            'password' => Hash::make('changeme'),
            'role_id' => 2,
        ]);
        User::factory()->create([
            'name' => 'client',
            'email' => 'customer@exemple.lan',
            'password' => Hash::make('changeme'),
            'role_id' => 3,
        ]);

    }
}
