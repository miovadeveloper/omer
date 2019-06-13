<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTrimesterikiucsTable extends Migration
{
    public function up()
    {
        Schema::table('trimesterikiucs', function (Blueprint $table) {
            $table->unsignedInteger('takip_id')->nullable();
            $table->foreign('takip_id', 'takip_fk_94715')->references('id')->on('takiplers');
        });
    }
}
