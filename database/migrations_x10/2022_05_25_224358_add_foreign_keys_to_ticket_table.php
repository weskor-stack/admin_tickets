<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket', function (Blueprint $table) {
            $table->foreign(['customer_id'], 'fk_ticket_customer1')->references(['customer_id'])->on('customer')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['status_ticket_id'], 'fk_ticket_ticket_status1')->references(['status_ticket_id'])->on('ticket_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['contact_id'], 'fk_ticket_contact1')->references(['contact_id'])->on('contact')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['priority_id'], 'fk_ticket_priority1')->references(['priority_id'])->on('priority')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket', function (Blueprint $table) {
            $table->dropForeign('fk_ticket_customer1');
            $table->dropForeign('fk_ticket_ticket_status1');
            $table->dropForeign('fk_ticket_contact1');
            $table->dropForeign('fk_ticket_priority1');
        });
    }
}
