<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMaterialCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('material_cost', function (Blueprint $table) {
            $table->foreign(['material_id'], 'fk_material_cost_material1')->references(['material_id'])->on('material')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('material_cost', function (Blueprint $table) {
            $table->dropForeign('fk_material_cost_material1');
        });
    }
}
