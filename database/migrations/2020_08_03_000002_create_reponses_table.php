<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponsesTable extends Migration
{
    public function up()
    {
        Schema::create('reponses', function (Blueprint $table) {
            $table->increments('id');
            $table->json('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
