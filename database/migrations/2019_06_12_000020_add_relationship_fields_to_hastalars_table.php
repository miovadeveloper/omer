<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHastalarsTable extends Migration
{
    public function up()
    {
        Schema::table('hastalars', function (Blueprint $table) {
            $table->unsignedInteger('hasta_kategorisi_id')->nullable();
            $table->foreign('hasta_kategorisi_id', 'hasta_kategorisi_fk_107149')->references('id')->on('hasta_kategorileris');
        });
    }
}
