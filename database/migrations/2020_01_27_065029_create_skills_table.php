<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->bigIncrements('skill_id');
            $table->unsignedBigInteger('rezume_id');
            $table->foreign('rezume_id')->references('id')->on('rezumes');
            $table->string('skill_title')->nullable();
            $table->string('skill_level')->nullable()->default('انتخاب نشده');
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
        Schema::dropIfExists('skills');
    }
}
