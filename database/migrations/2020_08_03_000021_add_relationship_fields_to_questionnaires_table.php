<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuestionnairesTable extends Migration
{
    public function up()
    {
        Schema::table('questionnaires', function (Blueprint $table) {
            $table->unsignedInteger('organisation_id');
            $table->foreign('organisation_id', 'organisation_fk_1931697')->references('id')->on('organisations');
            // $table->unsignedInteger('team_id')->nullable();
 //            $table->foreign('team_id', 'team_fk_1931698')->references('id')->on('teams');
        });
    }
}
