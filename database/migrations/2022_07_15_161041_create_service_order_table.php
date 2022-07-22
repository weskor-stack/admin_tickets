<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_order', function (Blueprint $table) {
            $table->increments('service_order_id')->comment('Registration identifier.');
            $table->dateTime('date_order')->comment('Date of order creation.');
            $table->unsignedInteger('ticket_id')->index('fk_service_order_ticket1_idx')->comment('ticket - Foreign key.');
            $table->unsignedInteger('type_maintenance_id')->index('fk_service_order_type_maintenance1_idx');
            $table->unsignedInteger('type_service_id')->index('fk_service_order_type_service1_idx');
            $table->unsignedInteger('status_order_id')->index('fk_service_order_order_status1_idx');
            $table->unsignedInteger('user_id')->index('idx_user')->comment('Registration user.');
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
        Schema::dropIfExists('service_order');
    }
}
