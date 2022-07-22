<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_status', function (Blueprint $table) {
            $table->increments('status_report_id')->comment('Registration identifier.');
            $table->string('name', 12)->comment('Status name.');
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
        Schema::dropIfExists('report_status');
    }
}
