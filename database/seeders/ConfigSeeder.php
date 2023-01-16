<?php

namespace Database\Seeders;

use App\Models\Config;

use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Config
        #empty the table to avoid duplicate
        Config::query()->truncate();

        Config::factory()->create([
            'app_name' => env('APP_NAME'),
            'app_url' => env('APP_URL'),
            'app_mail' => env('APP_EMAIL'),
            'app_media' => env('APP_MEDIA'),
            'app_theme' => env('APP_THEME'),
            'app_analytics' => env('APP_ANALYTICS'),
            'app_stripe_token' => env('APP_STRIPE_TOKEN'),
            'app_stripe_secret' => env('APP_STRIPE_SECRET'),
            'app_stripe_key' => env('APP_STRIPE_TOKEN'),
            'app_currency' => env('APP_CURRENCY'),
        ]);
        # end Config
    }
}
