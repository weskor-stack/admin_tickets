<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialAssignedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_assigned', function (Blueprint $table) {
            $table->integer('material_assigned_id', true);
            $table->unsignedInteger('material_id')->index('fk_material_assigned_material1_idx')->comment('material - foreignkey');
            $table->double('quantity')->comment('Material assigned for the service order.');
            $table->string('unit_measure', 20)->comment('Unit of measure.');
            $table->string('usage', 100)->comment('Material usage.');
            $table->unsignedInteger('service_order_id')->index('fk_material_assigned_service_order1_idx')->comment('service_order - Foreign key.');
            $table->unsignedInteger('user_id')->comment('Registration user.');
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
        Schema::dropIfExists('material_assigned');
    }
}
