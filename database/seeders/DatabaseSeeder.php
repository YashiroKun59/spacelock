<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\Log;
use App\Models\Manager;
use App\Models\Page;
use App\Models\Price;
use App\Models\Rental;
use App\Models\Site;
use App\Models\Slider;
use App\Models\Space;
use App\Models\Spacetype;
use App\Models\Support;
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
        ]);
        # run the rest of the seeders
        Customer::factory(100)->create();
        Log::factory(100)->create();
        Manager::factory(10)->create();
        Page::factory(100)->create();
        Price::factory(100)->create();
        Spacetype::factory(20)->create();
        Slider::factory(100)->create();
        Site::factory(10)->create();
        Space::factory(50)->create();
        Rental::factory(10)->create();
        Support::factory(100)->create();
    }
}
