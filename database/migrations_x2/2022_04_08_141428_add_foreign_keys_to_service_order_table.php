<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToServiceOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_order', function (Blueprint $table) {
            $table->foreign(['status_order_id'], 'fk_service_order_order_status1')->references(['status_order_id'])->on('order_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['type_maintenance_id'], 'fk_service_order_type_maintenance1')->references(['type_maintenance_id'])->on('type_maintenance')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ticket_id'], 'fk_service_order_ticket1')->references(['ticket_id'])->on('ticket')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['type_service_id'], 'fk_service_order_type_service1')->references(['type_service_id'])->on('type_service')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_order', function (Blueprint $table) {
            $table->dropForeign('fk_service_order_order_status1');
            $table->dropForeign('fk_service_order_type_maintenance1');
            $table->dropForeign('fk_service_order_ticket1');
            $table->dropForeign('fk_service_order_type_service1');
        });
    }
}
