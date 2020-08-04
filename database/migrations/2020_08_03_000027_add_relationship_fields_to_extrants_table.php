<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExtrantsTable extends Migration
{
    public function up()
    {
        Schema::table('extrants', function (Blueprint $table) {
            $table->unsignedInteger('effet_immediat_id');
            $table->foreign('effet_immediat_id', 'effet_immediat_fk_1931648')->references('id')->on('effet_immediats');
        });
    }
}
