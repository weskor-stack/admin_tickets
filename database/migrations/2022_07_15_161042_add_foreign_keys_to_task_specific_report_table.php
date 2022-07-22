<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTaskSpecificReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_specific_report', function (Blueprint $table) {
            $table->foreign(['task_specific_id'], 'fk_task_specific_report_task_specific1')->references(['task_specific_id'])->on('task_specific')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['service_id'], 'fk_task_specific_report_service_task_specific1')->references(['service_id'])->on('service_task_specific')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_specific_report', function (Blueprint $table) {
            $table->dropForeign('fk_task_specific_report_task_specific1');
            $table->dropForeign('fk_task_specific_report_service_task_specific1');
        });
    }
}
