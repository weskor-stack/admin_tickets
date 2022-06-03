<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service', function (Blueprint $table) {
            $table->foreign(['service_order_id'], 'fk_service_service_order1')->references(['service_order_id'])->on('service_order')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['status_report_id'], 'fk_service_report_status1')->references(['status_report_id'])->on('report_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service', function (Blueprint $table) {
            $table->dropForeign('fk_service_service_order1');
            $table->dropForeign('fk_service_report_status1');
        });
    }
}
