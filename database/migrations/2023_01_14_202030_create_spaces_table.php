<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nickname');
            $table->string('description');
            $table->string('picture');
            $table->unsignedInteger('length');
            $table->unsignedInteger('width');
            $table->unsignedInteger('height');
            $table->boolean('enabled');
            $table->foreignID('site_id')->constrained('sites');
            $table->foreignID('spacetype_id')->constrained('spacetypes');
            $table->foreignID('price_id')->constrained('prices');
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
        Schema::dropIfExists('spaces');
    }
}
