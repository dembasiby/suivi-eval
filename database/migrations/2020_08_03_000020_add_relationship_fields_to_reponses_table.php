<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReponsesTable extends Migration
{
    public function up()
    {
        Schema::table('reponses', function (Blueprint $table) {
            $table->unsignedInteger('question_id');
            $table->foreign('question_id', 'question_fk_1931701')->references('id')->on('questions');
            $table->unsignedInteger('questionnaire_id');
            $table->foreign('questionnaire_id', 'questionnaire_fk_1931702')->references('id')->on('questionnaires');
            $table->unsignedInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_1931706')->references('id')->on('teams');
        });
    }
}
