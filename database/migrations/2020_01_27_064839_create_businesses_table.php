<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('avatar')->nullable();
//            $table->string('social_network')->nullable();
            $table->text('phone')->nullable();
            $table->text('social_network')->nullable();
            $table->unsignedBigInteger('activity_id')->nullable()->default('0');
            $table->foreign('activity_id')->references('activity_id')->on('activities');
            $table->unsignedBigInteger('state_id')->nullable()->default('0');
            $table->foreign('state_id')->references('state_id')->on('states');
            $table->unsignedBigInteger('city_id')->nullable()->default('0');
            $table->foreign('city_id')->references('city_id')->on('cities');
            $table->unsignedBigInteger('region_id')->nullable()->default('0');
            $table->foreign('region_id')->references('region_id')->on('regions');

            $table->unsignedBigInteger('part_id')->nullable()->default('0');
            $table->foreign('part_id')->references('part_id')->on('parts');
            $table->unsignedBigInteger('village_id')->nullable()->default('0');
            $table->foreign('village_id')->references('village_id')->on('villages');
            $table->unsignedBigInteger('rural_id')->nullable()->default('0');
            $table->foreign('rural_id')->references('rural_id')->on('rurals');

            $table->string('street')->nullable();
            $table->string('map')->nullable();
            $table->text('explanation')->nullable();
            $table->string('action')->default('wait');
            $table->string('business_status')->nullable();
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
        Schema::dropIfExists('businesses');
    }
}
