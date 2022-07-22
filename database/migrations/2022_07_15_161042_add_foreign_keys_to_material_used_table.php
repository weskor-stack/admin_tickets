<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMaterialUsedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('material_used', function (Blueprint $table) {
            $table->foreign(['service_id'], 'fk_material_used_service1')->references(['service_id'])->on('service')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['material_id'], 'fk_material_assigned_material10')->references(['material_id'])->on('material')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('material_used', function (Blueprint $table) {
            $table->dropForeign('fk_material_used_service1');
            $table->dropForeign('fk_material_assigned_material10');
        });
    }
}
