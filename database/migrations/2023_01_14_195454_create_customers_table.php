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
            $table->string('lastname');
            $table->string('firstname');
            $table->string('address');
            $table->string('zipcode');
            $table->string('city');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string('reset_password_token');
            $table->timestamp('reset_password_send_at');
            $table->timestamp('remember_create_at');
            $table->unsignedInteger('signing_count');
            $table->timestamp('current_singing_at');
            $table->timestamp('last_signing_at');
            $table->string('current_signing_ip');
            $table->string('last_signing_ip');
            $table->string('comment');
            $table->boolean('data_collection');
            $table->boolean('enabled');
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
