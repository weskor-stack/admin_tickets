<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTrackingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_tracking', function (Blueprint $table) {
            $table->increments('tracking_id')->comment('Registration identifier.');
            $table->text('message');
            $table->enum('source', ['E', 'C']);
            $table->unsignedInteger('ticket_id')->index('fk_ticket_tracking_ticket1_idx');
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
        Schema::dropIfExists('ticket_tracking');
    }
}
