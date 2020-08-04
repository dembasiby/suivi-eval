<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEffetImmediatsTable extends Migration
{
    public function up()
    {
        Schema::table('effet_immediats', function (Blueprint $table) {
            $table->unsignedInteger('effet_intermediaire_id');
            $table->foreign('effet_intermediaire_id', 'effet_intermediaire_fk_1931641')->references('id')->on('effet_intermediaires');
        });
    }
}
