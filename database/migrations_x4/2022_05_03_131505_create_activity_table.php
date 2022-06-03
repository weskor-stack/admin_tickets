<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity', function (Blueprint $table) {
            $table->unsignedInteger('service_id')->primary();
            $table->string('description_activity', 250)->comment('Description of the activity');
            $table->string('previous_evidence', 250)->comment('Previous evidence.');
            $table->string('subsequent_evidence', 250)->comment('Subsequent evidence.');
            $table->text('signature_evidence')->comment('signature of conformity');
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
        Schema::dropIfExists('activity');
    }
}
