<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTaskSpecificTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_task_specific', function (Blueprint $table) {
            $table->unsignedInteger('service_id')->primary();
            $table->string('description_task', 250)->comment('Description of the activity');
            $table->string('previous_evidence', 250)->comment('Previous evidence.');
            $table->string('subsequent_evidence', 250)->comment('Subsequent evidence.');
            $table->text('signature_evidence')->comment('signature of conformity');
            $table->unsignedInteger('contact_id')->index('fk_service_task_specific_contact1_idx');
            $table->unsignedInteger('employee_id')->index('fk_service_task_specific_employee1_idx');
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
        Schema::dropIfExists('service_task_specific');
    }
}
