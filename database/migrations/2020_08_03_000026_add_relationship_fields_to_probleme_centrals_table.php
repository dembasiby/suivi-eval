<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProblemeCentralsTable extends Migration
{
    public function up()
    {
        Schema::table('probleme_centrals', function (Blueprint $table) {
            $table->unsignedInteger('resultat_intermediaire_id');
            $table->foreign('resultat_intermediaire_id', 'resultat_intermediaire_fk_1931661')->references('id')->on('resultat_intermediaires');
        });
    }
}
