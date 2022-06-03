<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMaterialAssignedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('material_assigned', function (Blueprint $table) {
            $table->foreign(['service_order_id'], 'fk_material_assigned_service_order1')->references(['service_order_id'])->on('service_order')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['material_id'], 'fk_material_assigned_material1')->references(['material_id'])->on('material')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('material_assigned', function (Blueprint $table) {
            $table->dropForeign('fk_material_assigned_service_order1');
            $table->dropForeign('fk_material_assigned_material1');
        });
    }
}
