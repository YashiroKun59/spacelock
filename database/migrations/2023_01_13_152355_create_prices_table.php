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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount',15,2);
            $table->decimal('tax', 15, 2);
            $table->date('start_date_at');
            $table->date('end_date_at');
            $table->decimal('discount_percent', 15, 2);
            $table->boolean('enabled')->default(false);
            $table->foreignId('id_space')->constrained('spaces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
};
