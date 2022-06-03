<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEmployeeOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_order', function (Blueprint $table) {
            $table->foreign(['service_order_id'], 'fk_employee_order_service_order1')->references(['service_order_id'])->on('service_order')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['employee_id'], 'fk_employee_order_employee1')->references(['employee_id'])->on('employee')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_order', function (Blueprint $table) {
            $table->dropForeign('fk_employee_order_service_order1');
            $table->dropForeign('fk_employee_order_employee1');
        });
    }
}
