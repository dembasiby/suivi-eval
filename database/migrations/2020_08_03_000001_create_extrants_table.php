<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtrantsTable extends Migration
{
    public function up()
    {
        Schema::create('extrants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_extrant')->unique();
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
