<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTrimesterbirsTable extends Migration
{
    public function up()
    {
        Schema::table('trimesterbirs', function (Blueprint $table) {
            $table->unsignedInteger('takip_id')->nullable();
            $table->foreign('takip_id', 'takip_fk_94695')->references('id')->on('takiplers');
        });
    }
}
