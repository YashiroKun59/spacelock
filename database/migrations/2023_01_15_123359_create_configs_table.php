<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('app_name');
            $table->string('app_url');
            $table->string('app_mail');
            $table->string('app_media');
            $table->string('app_theme');
            $table->string('app_analytics');
            $table->string('app_stripe_token');
            $table->string('app_stripe_secret');
            $table->string('app_stripe_key');
            $table->string('app_currency');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
