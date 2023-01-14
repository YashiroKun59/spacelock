<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateManagerRolePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager_role', function (Blueprint $table) {
            $table->foreignID('manager_id')->constrained('managers')->onDelete('cascade');
            $table->foreignID('role_id')->constrained('roles')->onDelete('cascade');
            $table->primary(['manager_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manager_role');
    }
}
