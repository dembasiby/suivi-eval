<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisation_team', function (Blueprint $table) {
			$table->unsignedInteger('organisation_id');
			$table->unsignedInteger('team_id');
			$table->timestamps();
			
			$table->foreign('organisation_id')->references('id')->on('organisations');
			$table->foreign('team_id')->references('id')->on('teams');         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_team');
    }
}
