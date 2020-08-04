<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultatIntermediairesTable extends Migration
{
    public function up()
    {
        Schema::create('resultat_intermediaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_resultat_intermediaire');
            $table->string('description')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
