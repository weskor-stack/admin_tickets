<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tool', function (Blueprint $table) {
            $table->increments('tool_id')->comment('Registration identifier.');
            $table->char('key', 50)->comment('Key in inventory.');
            $table->text('name')->comment('Description of the tool.');
            $table->double('stock');
            $table->unsignedInteger('unit_measure_id')->index('fk_tool_unit_measure1_idx');
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
        Schema::dropIfExists('tool');
    }
}
