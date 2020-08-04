<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToIndicateursTable extends Migration
{
    public function up()
    {
        Schema::table('indicateurs', function (Blueprint $table) {
            $table->unsignedInteger('probleme_central_id')->nullable();
            $table->foreign('probleme_central_id', 'probleme_central_fk_1931671')->references('id')->on('probleme_centrals');
            $table->unsignedInteger('extrant_id')->nullable();
            $table->foreign('extrant_id', 'extrant_fk_1931672')->references('id')->on('extrants');
            $table->unsignedInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_1931674')->references('id')->on('teams');
        });
    }
}
