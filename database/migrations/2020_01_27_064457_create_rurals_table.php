<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rurals', function (Blueprint $table) {
            $table->bigIncrements('rural_id');
            $table->string('rural_name');
            $table->unsignedBigInteger('village_id');
            $table->foreign('village_id')->references('village_id')->on('villages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rurals');
    }
}
