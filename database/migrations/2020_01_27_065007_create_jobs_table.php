<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
//            $table->unsignedBigInteger('user_id');
//            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('rezume_id');
            $table->foreign('rezume_id')->references('id')->on('rezumes');
            $table->unsignedBigInteger('activity_id')->nullable()->default('0');
            $table->foreign('activity_id')->references('activity_id')->on('activities');
            $table->string('job_title')->nullable();
            $table->unsignedBigInteger('cooperation_id')->nullable()->default('0');
            $table->foreign('cooperation_id')->references('cooperation_id')->on('cooperations');
            $table->unsignedBigInteger('salary_id')->nullable()->default('0');
            $table->foreign('salary_id')->references('salary_id')->on('salaries');
            $table->unsignedBigInteger('activity_time_id')->nullable()->default('0');
            $table->foreign('activity_time_id')->references('activity_time_id')->on('activity_times');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
