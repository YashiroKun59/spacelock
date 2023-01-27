<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lastname')->nullable();
            $table->string('name')->nullable();
            $table->string('firstname')->nullable();
            $table->string('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('reset_password_token')->nullable();
            $table->timestamp('reset_password_send_at')->nullable();
            $table->timestamp('remember_create_at')->nullable();
            $table->string('remember_token')->nullable();
            $table->unsignedInteger('signing_count')->nullable();
            $table->timestamp('current_singing_at')->nullable();
            $table->timestamp('last_signing_at')->nullable();
            $table->string('current_signing_ip')->nullable();
            $table->string('last_signing_ip')->nullable();
            $table->string('comment')->nullable();
            $table->boolean('data_collection')->default(false);
            $table->boolean('enabled')->nullable();
            $table->string('stripe_id')->unique()->nullable();
            $table->string('pm_type')->nullable();
            $table->string('pm_last_four', 4)->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->foreignID('role_id')->default(1)->constrained('roles');
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
        Schema::dropIfExists('users');
    }
};
