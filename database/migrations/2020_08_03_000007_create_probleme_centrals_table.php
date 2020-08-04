<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemeCentralsTable extends Migration
{
    public function up()
    {
        Schema::create('probleme_centrals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_probleme_central');
            $table->string('description')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
