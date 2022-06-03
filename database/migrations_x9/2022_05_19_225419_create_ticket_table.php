<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->increments('ticket_id')->comment('Registration identifier.');
            $table->string('subject', 250)->comment('Ticket subject');
            $table->text('problem')->comment('Problem to be solved');
            $table->dateTime('date_ticket')->useCurrent()->comment('Creation date.');
            $table->unsignedInteger('status_ticket_id')->index('fk_ticket_ticket_status1_idx')->comment('ticket status - Foreign key.');
            $table->unsignedInteger('customer_id')->index('fk_ticket_customer1_idx')->comment('Customer - Foreign key.');
            $table->unsignedInteger('contact_id')->index('fk_ticket_contact1_idx')->comment('contact - Foreign key.');
            $table->unsignedInteger('priority_id')->index('fk_ticket_priority1_idx')->comment('priority - Foreign key.');
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
        Schema::dropIfExists('ticket');
    }
}
