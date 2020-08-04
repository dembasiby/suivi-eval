<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEffetIntermediairesTable extends Migration
{
    public function up()
    {
        Schema::create('effet_intermediaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
