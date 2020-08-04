<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionQuestionnairePivotTable extends Migration
{
    public function up()
    {
        Schema::create('question_questionnaire', function (Blueprint $table) {
            $table->unsignedInteger('questionnaire_id');
            $table->foreign('questionnaire_id', 'questionnaire_id_fk_1931696')->references('id')->on('questionnaires')->onDelete('cascade');
            $table->unsignedInteger('question_id');
            $table->foreign('question_id', 'question_id_fk_1931696')->references('id')->on('questions')->onDelete('cascade');
        });
    }
}
