<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTaskSpecificToolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_specific_tool', function (Blueprint $table) {
            $table->foreign(['tool_used_id'], 'fk_task_specific_tool_tool_used1')->references(['tool_used_id'])->on('tool_used')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['service_id', 'task_specific_id'], 'fk_task_specific_tool_task_specific_report1')->references(['service_id', 'task_specific_id'])->on('task_specific_report')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_specific_tool', function (Blueprint $table) {
            $table->dropForeign('fk_task_specific_tool_tool_used1');
            $table->dropForeign('fk_task_specific_tool_task_specific_report1');
        });
    }
}
