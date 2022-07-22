<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialUsedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_used', function (Blueprint $table) {
            $table->increments('material_used_id');
            $table->unsignedInteger('material_id')->index('fk_material_assigned_material1_idx')->comment('material - foreignkey');
            $table->double('quantity')->comment('Material assigned for the service order.');
            $table->unsignedInteger('service_id')->index('fk_material_used_service1_idx');
            $table->unsignedInteger('user_id')->index('idx_user')->comment('Registration user.');
            $table->timestamp('date_registration')->useCurrent()->comment('Date of registration.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_used');
    }
}
