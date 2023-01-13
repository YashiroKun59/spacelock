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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('zipcode');
            $table->string('city');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string('reset_password_token');
            $table->dateTime('reset_password_sent_at');
            $table->dateTime('remember_created_at');
            $table->integer('sign_in_count');
            $table->dateTime('current_sign_in_at');
            $table->dateTime('last_sign_in_at');
            $table->string('current_sign_in_ip');
            $table->string('last_sign_in_ip');
            $table->string('comment');
            $table->boolean('enabled')->default(false);
            $table->date('data_at');
            $table->boolean('data_collection')->default(false);
            $table->date('published_at')->nullable();
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
};
