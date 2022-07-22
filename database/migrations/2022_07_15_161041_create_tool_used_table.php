<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolUsedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tool_used', function (Blueprint $table) {
            $table->increments('tool_used_id');
            $table->unsignedInteger('tool_id')->index('fk_tool_assigned_tool1_idx')->comment('Tool - foreignkey');
            $table->double('quantity');
            $table->unsignedInteger('service_id')->index('fk_tool_used_service1_idx');
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
        Schema::dropIfExists('tool_used');
    }
}
