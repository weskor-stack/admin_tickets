<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToServiceReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_report', function (Blueprint $table) {
            $table->foreign(['service_id'], 'fk_service_report_service2')->references(['service_id'])->on('service')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['employee_id'], 'fk_service_report_employee1')->references(['employee_id'])->on('employee')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_report', function (Blueprint $table) {
            $table->dropForeign('fk_service_report_service2');
            $table->dropForeign('fk_service_report_employee1');
        });
    }
}
