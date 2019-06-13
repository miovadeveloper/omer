<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1559864448625MuayanesTable extends Migration
{
    public function up()
    {
        Schema::table('muayanes', function (Blueprint $table) {
            $table->unsignedInteger('takip_id')->nullable();
            $table->foreign('takip_id', 'takip_fk_94677')->references('id')->on('takiplers');
        });
    }

    public function down()
    {
        Schema::table('muayanes', function (Blueprint $table) {
        });
    }
}
