<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTaskSpecificMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_specific_material', function (Blueprint $table) {
            $table->foreign(['service_id', 'task_specific_id'], 'fk_task_specific_material_task_specific_report1')->references(['service_id', 'task_specific_id'])->on('task_specific_report')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['material_used_id'], 'fk_task_specific_material_material_used1')->references(['material_used_id'])->on('material_used')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_specific_material', function (Blueprint $table) {
            $table->dropForeign('fk_task_specific_material_task_specific_report1');
            $table->dropForeign('fk_task_specific_material_material_used1');
        });
    }
}
