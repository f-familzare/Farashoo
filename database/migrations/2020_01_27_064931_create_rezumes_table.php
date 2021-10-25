<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRezumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rezumes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');


            // General Information Filed
            $table->integer('age')->nullable();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('avatar')->nullable();
            $table->string('status')->nullable()->default('0'); // single : 0 , Married : 1
            $table->unsignedBigInteger('state_id')->nullable()->default('0');
            $table->foreign('state_id')->references('state_id')->on('states');
            $table->unsignedBigInteger('city_id')->nullable()->default('0');
            $table->foreign('city_id')->references('city_id')->on('cities');
            $table->unsignedBigInteger('region_id')->nullable()->default('0');
            $table->foreign('region_id')->references('region_id')->on('regions');
            $table->string('rezume_status')->nullable()->default('0');
            $table->text('about_me')->nullable();
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
        Schema::dropIfExists('rezumes');
    }
}
