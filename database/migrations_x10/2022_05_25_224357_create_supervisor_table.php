<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisor', function (Blueprint $table) {
            $table->increments('supervisor_id')->comment('Registration identifier.');
            $table->string('name', 30)->comment('Employee name.');
            $table->string('last_name', 30)->comment('Employees last name.');
            $table->string('email', 50)->comment('Employees email.');
            $table->unsignedInteger('department_id')->index('fk_employee_department_idx')->comment('Department - Foreign key.');
            $table->unsignedInteger('status_id')->index('fk_employee_status1_idx')->comment('status - Foreign key.');
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
        Schema::dropIfExists('supervisor');
    }
}
