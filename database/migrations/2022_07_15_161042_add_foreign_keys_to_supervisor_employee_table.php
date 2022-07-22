<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSupervisorEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supervisor_employee', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'fk_supervisor_employee_employee2')->references(['employee_id'])->on('employee')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['supervisor_employee_id'], 'fk_supervisor_employee_employee1')->references(['employee_id'])->on('employee')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['department_id'], 'fk_supervisor_employee_department1')->references(['department_id'])->on('department')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supervisor_employee', function (Blueprint $table) {
            $table->dropForeign('fk_supervisor_employee_employee2');
            $table->dropForeign('fk_supervisor_employee_employee1');
            $table->dropForeign('fk_supervisor_employee_department1');
        });
    }
}
