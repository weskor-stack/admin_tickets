<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_report', function (Blueprint $table) {
            $table->increments('service_report_id');
            $table->time('time_entry')->comment('Time of entry.');
            $table->time('time_completion')->comment('Time of completion.');
            $table->time('lunchtime');
            $table->double('service_hours')->comment('Hours of service.');
            $table->double('service_extras')->comment('Overtime service.');
            $table->double('duration_travel')->comment('Duration of travel.');
            $table->dateTime('date_service');
            $table->unsignedInteger('service_id')->index('fk_service_report_service2_idx');
            $table->unsignedInteger('employee_id')->index('fk_service_report_employee1_idx');
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
        Schema::dropIfExists('service_report');
    }
}
