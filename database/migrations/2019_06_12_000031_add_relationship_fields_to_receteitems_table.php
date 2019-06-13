<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReceteitemsTable extends Migration
{
    public function up()
    {
        Schema::table('receteitems', function (Blueprint $table) {
            $table->unsignedInteger('ilac_id')->nullable();
            $table->foreign('ilac_id', 'ilac_fk_106735')->references('id')->on('ilaclars');
            $table->unsignedInteger('receteadi_id')->nullable();
            $table->foreign('receteadi_id', 'receteadi_fk_106745')->references('id')->on('recetelers');
        });
    }
}
