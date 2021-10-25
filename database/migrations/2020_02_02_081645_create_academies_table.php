<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rezume_id');
            $table->foreign('rezume_id')->references('id')->on('rezumes');
            $table->unsignedBigInteger('degree_of_education_id')->default('0')->nullable();
            $table->foreign('degree_of_education_id')->references('degree_of_education_id')->on('degree_of_educations');
            $table->integer('major_id')->unsigned()->default('0')->nullable();
            $table->foreign('major_id')->references('major_id')->on('majors');
            $table->string('collage_name')->nullable();
            $table->string('education_status')->nullable()->default('انتخاب نشده'); // student : 0 , graduated : 1
            $table->string('start_date')->nullable()->default('انتخاب نشده');
            $table->string('end_date')->nullable()->default('انتخاب نشده');
            $table->integer('mark')->nullable();
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
        Schema::dropIfExists('academies');
    }
}
