<?php
//Table Spaces
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
        Schema::create('spaces', function (Blueprint $table) {
            $table->id();
            $table->string('nickname');
            $table->string('description');
            $table->string('picture');
            $table->integer('length');
            $table->integer('width');
            $table->integer('height');
            $table->foreignId('site_id')->constrained('spaces');
            $table->foreignId('spacetype_id')->constrained('spaces_types');
            $table->date('published_at')->nullable();
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
        Schema::dropIfExists('spaces');
    }
};
