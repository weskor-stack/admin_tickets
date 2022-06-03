<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSupervisorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supervisor', function (Blueprint $table) {
            $table->foreign(['status_id'], 'fk_employee_status10')->references(['status_id'])->on('status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['department_id'], 'fk_employee_department0')->references(['department_id'])->on('department')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supervisor', function (Blueprint $table) {
            $table->dropForeign('fk_employee_status10');
            $table->dropForeign('fk_employee_department0');
        });
    }
}
