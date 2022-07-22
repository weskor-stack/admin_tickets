<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolUsedCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tool_used_cost', function (Blueprint $table) {
            $table->unsignedInteger('tool_used_id')->primary();
            $table->decimal('average', 18);
            $table->decimal('client', 18);
            $table->unsignedInteger('user_id')->index('idx_user');
            $table->timestamp('data_registration')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tool_used_cost');
    }
}
