<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblematicTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problematic_ticket', function (Blueprint $table) {
            $table->integer('problematic_ticket_id', true);
            $table->string('description', 50);
            $table->unsignedInteger('user_id');
            $table->timestamp('date_registration')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problematic_ticket');
    }
}
