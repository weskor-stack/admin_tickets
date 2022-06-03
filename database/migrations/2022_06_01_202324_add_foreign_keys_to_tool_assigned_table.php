<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToToolAssignedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tool_assigned', function (Blueprint $table) {
            $table->foreign(['service_order_id'], 'fk_tool_assigned_service_order1')->references(['service_order_id'])->on('service_order')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tool_assigned', function (Blueprint $table) {
            $table->dropForeign('fk_tool_assigned_service_order1');
        });
    }
}
