<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnairesTable extends Migration
{
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('annee');
            $table->string('trimestre');
            $table->integer('statut')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
