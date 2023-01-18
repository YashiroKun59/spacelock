<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->unique();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('address');
            $table->string('zipcode');
            $table->string('city');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('reset_password_token');
            $table->timestamp('reset_password_send_at')->nullable();
            $table->timestamp('remember_create_at')->nullable();
            $table->unsignedInteger('signing_count');
            $table->timestamp('current_singing_at')->nullable();
            $table->timestamp('last_signing_at')->nullable();
            $table->string('current_signing_ip');
            $table->string('last_signing_ip');
            $table->string('comment');
            $table->boolean('data_collection');
            $table->boolean('enabled');
            $table->string('stripe_id')->unique()->nullable();
            $table->string('pm_type')->unique();
            $table->string('pm_last_four', 4)->nullable();
            $table->timestamp('trial_ends_at')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
