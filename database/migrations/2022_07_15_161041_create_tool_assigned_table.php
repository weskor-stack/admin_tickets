<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolAssignedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tool_assigned', function (Blueprint $table) {
            $table->increments('tool_assigned_id');
            $table->unsignedInteger('tool_id')->index('fk_tool_assigned_tool1_idx')->comment('Tool - foreignkey');
            $table->double('quantity');
            $table->unsignedInteger('service_order_id')->index('fk_tool_assigned_service_order1_idx');
            $table->unsignedInteger('user_id')->index('idx_user')->comment('Registration user.');
            $table->timestamp('date_registration')->useCurrent()->comment('Date of registration.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tool_assigned');
    }
}
