<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #Option
        #empty the table to avoid duplicate
        #Option::query()->truncate();

        Option::factory()->create([
            'name'=> 'eau',
            'description'=> 'eau courante disponnible',
            'enabled'=> true,
        ]);
        Option::factory()->create([
            'name'=> 'electricité',
            'description'=> 'electricité disponnible',
            'enabled'=> true,
        ]);
        Option::factory()->create([
            'name'=> 'internet',
            'description'=> 'internet disponible',
            'enabled'=> true,
        ]);

        #end Option
    }
}
