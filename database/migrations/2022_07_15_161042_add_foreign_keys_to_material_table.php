<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('material', function (Blueprint $table) {
            $table->foreign(['unit_measure_id'], 'fk_material_unit_measure1')->references(['unit_measure_id'])->on('unit_measure')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['classified_material_id'], 'fk_material_classified_material1')->references(['classified_material_id'])->on('classified_material')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('material', function (Blueprint $table) {
            $table->dropForeign('fk_material_unit_measure1');
            $table->dropForeign('fk_material_classified_material1');
        });
    }
}
