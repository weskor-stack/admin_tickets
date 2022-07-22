<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToToolCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tool_cost', function (Blueprint $table) {
            $table->foreign(['tool_id'], 'fk_tool_cost_tool1')->references(['tool_id'])->on('tool')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tool_cost', function (Blueprint $table) {
            $table->dropForeign('fk_tool_cost_tool1');
        });
    }
}
