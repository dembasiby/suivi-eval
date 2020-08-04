<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuestionsTable extends Migration
{
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->unsignedInteger('type_question_id');
            $table->foreign('type_question_id', 'type_question_fk_1931685')->references('id')->on('type_questions');
            $table->unsignedInteger('indicateur_id');
            $table->foreign('indicateur_id', 'indicateur_fk_1931687')->references('id')->on('indicateurs');
            $table->unsignedInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_1931688')->references('id')->on('teams');
        });
    }
}
