<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskSpecificReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_specific_report', function (Blueprint $table) {
            $table->unsignedInteger('service_id')->index('fk_task_specific_report_service_task_specific1_idx');
            $table->unsignedInteger('task_specific_id')->index('fk_task_specific_report_task_specific1_idx');
            $table->unsignedInteger('user_id')->index('idx_user');
            $table->timestamp('date_registration')->useCurrent();

            $table->primary(['service_id', 'task_specific_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_specific_report');
    }
}
