<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Log;
use App\Models\Page;
use App\Models\Price;
use App\Models\Rental;
use App\Models\Site;
use App\Models\Slider;
use App\Models\Space;
use App\Models\Spacetype;
use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        #run external seeder before the others one.
        $this->call([
            ConfigSeeder::class,
            RoleSeeder::class,
            OptionSeeder::class,
            UserSeeder::class,
        ]);
        // # run the rest of the seeders
        User::factory(100)->create();
        error_log('Seeding User done');
        Log::factory(100)->create();
        error_log('Seeding Log done');
        Page::factory(100)->create();
        error_log('Seeding Page done');
        Price::factory(100)->create();
        error_log('Seeding Price done');
        Spacetype::factory(20)->create();
        error_log('Seeding Spacetype done');
        Slider::factory(100)->create();
        error_log('Seeding Slider done');
        Site::factory(10)->create();
        error_log('Seeding Site done');
        Space::factory(50)->create();
        error_log('Seeding Space done');
        Rental::factory(10)->create();
        error_log('Seeding Rental done');
        Support::factory(100)->create();
        error_log('Seeding Support done');
    }
}
