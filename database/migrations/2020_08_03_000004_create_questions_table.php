<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('recurrence')->default('continue');
			$table->json('options')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
