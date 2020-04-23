<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('score');
            $table->timestamps();

            $table->bigInteger('userId')->unsigned()->index();
            $table->foreign('userId')->references('id')->on('users');

            $table->bigInteger('contestId')->unsigned()->index();
            $table->foreign('contestId')->references('id')->on('contests');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
