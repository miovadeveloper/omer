<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRecetelersTable extends Migration
{
    public function up()
    {
        Schema::table('recetelers', function (Blueprint $table) {
            $table->unsignedInteger('takip_id')->nullable();
            $table->foreign('takip_id', 'takip_fk_106453')->references('id')->on('takiplers');
            $table->unsignedInteger('hasta_id')->nullable();
            $table->foreign('hasta_id', 'hasta_fk_106454')->references('id')->on('hastalars');
        });
    }
}
