<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToToolUsedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tool_used', function (Blueprint $table) {
            $table->foreign(['service_id'], 'fk_tool_used_service1')->references(['service_id'])->on('service')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['tool_id'], 'fk_tool_assigned_tool10')->references(['tool_id'])->on('tool')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tool_used', function (Blueprint $table) {
            $table->dropForeign('fk_tool_used_service1');
            $table->dropForeign('fk_tool_assigned_tool10');
        });
    }
}
