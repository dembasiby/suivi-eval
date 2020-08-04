<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicateurOrganisationPivotTable extends Migration
{
    public function up()
    {
        Schema::create('indicateur_organisation', function (Blueprint $table) {
            $table->unsignedInteger('indicateur_id');
            $table->foreign('indicateur_id', 'indicateur_id_fk_1931673')->references('id')->on('indicateurs')->onDelete('cascade');
            $table->unsignedInteger('organisation_id');
            $table->foreign('organisation_id', 'organisation_id_fk_1931673')->references('id')->on('organisations')->onDelete('cascade');
        });
    }
}
