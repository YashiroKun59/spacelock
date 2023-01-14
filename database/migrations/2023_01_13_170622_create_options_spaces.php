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
            $table->date('published_at')->nullable();
            $table->boolean('enabled')->default(false);
            $table->foreignID('option_id')->constrained('spaces');
            $table->foreignID('space_id')->constrained('spaces');
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
        Schema::dropIfExists('options_spaces');
    }
};
