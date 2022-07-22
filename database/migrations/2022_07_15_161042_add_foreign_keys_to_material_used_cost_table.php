<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMaterialUsedCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('material_used_cost', function (Blueprint $table) {
            $table->foreign(['material_used_id'], 'fk_material_used_cost_material_used1')->references(['material_used_id'])->on('material_used')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('material_used_cost', function (Blueprint $table) {
            $table->dropForeign('fk_material_used_cost_material_used1');
        });
    }
}
