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
        Schema::create('options_spaces', function (Blueprint $table) {
            $table->integer('option_id');
            $table->integer('space_id');
            $table->timestamps();
            $table->foreign('option_id')->references('id')->on('options');
            $table->foreign('sapce_id')->references('id')->on('spaces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options_spaces');
    }
};
