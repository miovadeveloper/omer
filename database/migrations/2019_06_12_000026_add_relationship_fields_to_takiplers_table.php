<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTakiplersTable extends Migration
{
    public function up()
    {
        Schema::table('takiplers', function (Blueprint $table) {
            $table->unsignedInteger('hasta_id');
            $table->foreign('hasta_id', 'hasta_fk_94586')->references('id')->on('hastalars');
        });
    }
}
