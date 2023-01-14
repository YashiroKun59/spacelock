<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOptionSpacePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_space', function (Blueprint $table) {
            $table->foreignID('option_id')->constrained('options')->onDelete('cascade');
            $table->foreignID('space_id')->constrained('spaces')->onDelete('cascade');
            $table->primary(['option_id', 'space_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_space');
    }
}
