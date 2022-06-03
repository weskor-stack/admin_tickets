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
            $table->integer('tool_assigned_id', true);
            $table->unsignedInteger('tool_id')->comment('Registration identifier.');
            $table->double('quantity');
            $table->string('unit_measure', 45)->comment('Quantity allocated.');
            $table->string('usage', 100);
            $table->unsignedInteger('service_order_id')->index('fk_tool_assigned_service_order1_idx');
            $table->unsignedInteger('user_id')->comment('Registration user.');
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
