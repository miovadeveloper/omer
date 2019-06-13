<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNotlarsTable extends Migration
{
    public function up()
    {
        Schema::table('notlars', function (Blueprint $table) {
            $table->unsignedInteger('takip_id');
            $table->foreign('takip_id', 'takip_fk_94612')->references('id')->on('takiplers');
        });
    }
}
