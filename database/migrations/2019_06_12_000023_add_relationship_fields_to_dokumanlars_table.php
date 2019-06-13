<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDokumanlarsTable extends Migration
{
    public function up()
    {
        Schema::table('dokumanlars', function (Blueprint $table) {
            $table->unsignedInteger('takip_id');
            $table->foreign('takip_id', 'takip_fk_94617')->references('id')->on('takiplers');
        });
    }
}
