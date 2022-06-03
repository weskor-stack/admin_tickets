<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_order', function (Blueprint $table) {
            $table->unsignedInteger('service_order_id')->index('fk_employee_order_service_order1_idx');
            $table->unsignedInteger('employee_id')->index('fk_employee_order_employee1_idx');
            $table->unsignedInteger('user_id');
            $table->timestamp('date_registration')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_order');
    }
}
