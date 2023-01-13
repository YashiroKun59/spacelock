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
        Schema::create('managers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->string('avatar');
            $table->date('reset_password_token');
            $table->date('reset_password_sent_at');
            $table->date('remember_created_at');
            $table->string('sign_in_count');
            $table->date('current_sign_in_at');
            $table->date('last_sign_in_at');
            $table->string('current_sign_in_ip');
            $table->string('last_sign_in_ip');
            $table->date('published_at')->nullable();
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
        Schema::dropIfExists('brands');
    }
};
