<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicateursTable extends Migration
{
    public function up()
    {
        Schema::create('indicateurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_indicateur')->unique();
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
