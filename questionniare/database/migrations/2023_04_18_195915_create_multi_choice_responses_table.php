<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultiChoiceResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multi_choice_responses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('choice_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('responder_id');
            $table->unsignedBigInteger('questionnaire_id');

            $table->foreign('questionnaire_id')->references('id')->on('questionnaires')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('choice_id')->references('id')->on('choices')->onDelete('cascade');
            $table->foreign('responder_id')->references('id')->on('responders')->onDelete('cascade');

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
        Schema::dropIfExists('multi_choice_responses');
    }
}
