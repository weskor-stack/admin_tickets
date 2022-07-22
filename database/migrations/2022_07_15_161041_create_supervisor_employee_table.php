<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisor_employee', function (Blueprint $table) {
            $table->unsignedInteger('supervisor_employee_id')->index('fk_supervisor_employee1_idx');
            $table->unsignedInteger('employee_id')->index('fk_supervisor_employee_employee2_idx');
            $table->unsignedInteger('department_id')->index('fk_supervisor_employee_department1_idx');
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
        Schema::dropIfExists('supervisor_employee');
    }
}
