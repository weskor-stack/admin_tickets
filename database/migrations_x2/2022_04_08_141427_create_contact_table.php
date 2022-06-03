<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->unsignedInteger('contact_id')->primary()->comment('Registration identifier.');
            $table->string('name', 20)->comment('Customer name.');
            $table->string('last_name', 30)->comment('Customer last name.');
            $table->string('email', 50)->comment('Customer email.');
            $table->string('phone', 20)->comment('Customer phone.');
            $table->unsignedInteger('customer_id')->index('fk_contact_customer1_idx')->comment('customer - Foreign key.');
            $table->unsignedInteger('status_id')->index('fk_contact_status1_idx')->comment('status - Foreign key.');
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
        Schema::dropIfExists('contact');
    }
}
