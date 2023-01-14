<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('number');
            $table->text('message');
            $table->timestamp('send_at');
            $table->unsignedInteger('status');
            $table->boolean('from_manager');
            $table->boolean('enabled');
            $table->unsignedInteger('manager_id');
            $table->foreign('manager_id')->references('id')->on('managers');
            $table->unsignedInteger('rental_id');
            $table->foreign('rental_id')->references('id')->on('rentals');
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
        Schema::dropIfExists('supports');
    }
}
