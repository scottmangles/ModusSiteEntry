<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_result', function (Blueprint $table) {
            $table->bigInteger('result_id')->unsigned();
            $table->bigInteger('option_id')->unsigned();
            $table->bigInteger('question_id')->unsigned();
            $table->integer('points')->default(0);


            $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_result');
    }
}
