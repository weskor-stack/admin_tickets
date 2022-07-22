<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToServiceTaskSpecificTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_task_specific', function (Blueprint $table) {
            $table->foreign(['service_id'], 'fk_service_task_specific_service1')->references(['service_id'])->on('service')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['employee_id'], 'fk_service_task_specific_employee1')->references(['employee_id'])->on('employee')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['contact_id'], 'fk_service_task_specific_contact1')->references(['contact_id'])->on('contact')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_task_specific', function (Blueprint $table) {
            $table->dropForeign('fk_service_task_specific_service1');
            $table->dropForeign('fk_service_task_specific_employee1');
            $table->dropForeign('fk_service_task_specific_contact1');
        });
    }
}
