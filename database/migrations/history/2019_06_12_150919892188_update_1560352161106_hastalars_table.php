<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1560352161106HastalarsTable extends Migration
{
    public function up()
    {
        Schema::table('hastalars', function (Blueprint $table) {
            $table->unsignedInteger('hastak_id')->nullable();
            $table->foreign('hastak_id', 'hastak_fk_105895')->references('id')->on('hasta_kategorileris');
            $table->longText('hasta_genel')->nullable();
            $table->longText('hasta_cocuk')->nullable();
        });
    }

    public function down()
    {
        Schema::table('hastalars', function (Blueprint $table) {
        });
    }
}
