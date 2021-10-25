<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software', function (Blueprint $table) {
            $table->increments('software_id');
            $table->unsignedBigInteger('rezume_id');
            $table->foreign('rezume_id')->references('id')->on('rezumes');
            $table->string('software_title')->nullable();
            $table->string('software_level')->nullable()->default('انتخاب نشده');
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
        Schema::dropIfExists('software');
    }
}
