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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('at');
            $table->float('lon');
            $table->string('description');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('zipcode');
            $table->string('city');
            $table->string('picture');
            $table->foreignId('manager_id')->constrained('managers');
            $table->date('published_at')->nullable();
            $table->boolean('enabled')->default(false);
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
        Schema::dropIfExists('sites');
    }
};
