<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('avatar');
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
        Schema::dropIfExists('managers');
    }
}
