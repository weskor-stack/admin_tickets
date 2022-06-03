<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('customer_id')->comment('Registration identifier.');
            $table->string('key', 45);
            $table->string('name', 50)->comment('Customer name.');
            $table->string('address', 100)->comment('Customer address.');
            $table->string('email', 50)->comment('Customer email.');
            $table->string('phone', 20)->comment('CUstomer phone.');
            $table->unsignedInteger('status_id')->index('fk_customer_status1_idx')->comment('status - Foreign key.');
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
        Schema::dropIfExists('customer');
    }
}
