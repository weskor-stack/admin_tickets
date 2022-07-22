<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToToolUsedCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tool_used_cost', function (Blueprint $table) {
            $table->foreign(['tool_used_id'], 'fk_tool_used_cost_tool_used1')->references(['tool_used_id'])->on('tool_used')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tool_used_cost', function (Blueprint $table) {
            $table->dropForeign('fk_tool_used_cost_tool_used1');
        });
    }
}
