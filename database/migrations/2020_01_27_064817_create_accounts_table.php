<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
//            $table->string('username');
            $table->string('avatar')->nullable();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('mobile')->nullable();
            $table->string('gender')->default('انتخاب نشده'); // 0 : man , 1: woman
            $table->unsignedBigInteger('state_id')->nullable()->default('0');
            $table->foreign('state_id')->references('state_id')->on('states');
            $table->unsignedBigInteger('city_id')->nullable()->default('0');
            $table->foreign('city_id')->references('city_id')->on('cities');
            $table->unsignedBigInteger('region_id')->nullable()->default('0');
            $table->foreign('region_id')->references('region_id')->on('regions');
            $table->string('account_status')->nullable()->default('0');

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
        Schema::dropIfExists('accounts');
    }
}
