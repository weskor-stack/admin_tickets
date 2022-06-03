<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service', function (Blueprint $table) {
            $table->increments('service_id')->comment('Registration identifier.');
            $table->dateTime('date_service')->comment('Date of order creation.');
            $table->unsignedInteger('status_report_id')->index('fk_service_report_status1_idx')->comment('report_status - Foreign key.');
            $table->unsignedInteger('service_order_id')->index('fk_service_service_order1_idx')->comment('service_order - Foreign key.');
            $table->unsignedInteger('priority_id')->index('fk_priority1_idx')->comment('priority_id  - Foreign key.');
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
        Schema::dropIfExists('service');
    }
}
