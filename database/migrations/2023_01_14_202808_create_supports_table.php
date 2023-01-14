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
            $table->timestamp('send_at')->nullable();
            $table->unsignedInteger('status');
            $table->boolean('from_manager');
            $table->boolean('enabled');
            $table->foreignID('manager_id')->constrained('managers');
            $table->foreignID('rental_id')->constrained('rentals');
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
