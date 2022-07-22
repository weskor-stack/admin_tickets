<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToToolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tool', function (Blueprint $table) {
            $table->foreign(['unit_measure_id'], 'fk_tool_unit_measure1')->references(['unit_measure_id'])->on('unit_measure')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tool', function (Blueprint $table) {
            $table->dropForeign('fk_tool_unit_measure1');
        });
    }
}
