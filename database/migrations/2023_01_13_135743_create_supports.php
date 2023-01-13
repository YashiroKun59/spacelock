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
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->text('message');
            $table->timestamp('sent_at')->nullable();
            $table->boolean('from_manager');
            $table->integer('status');
            $table->date('published_at')->nullable();
            $table->boolean('enabled');
            $table->foreignId('manager_id')->constrained('customers');
            $table->foreignId('rental_id')->constrained('customers');
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
};
