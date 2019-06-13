<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAmeliyatlarsTable extends Migration
{
    public function up()
    {
        Schema::table('ameliyatlars', function (Blueprint $table) {
            $table->unsignedInteger('takip_id')->nullable();
            $table->foreign('takip_id', 'takip_fk_94637')->references('id')->on('takiplers');
        });
    }
}
