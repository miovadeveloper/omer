<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1560371666916ReceteitemsTable extends Migration
{
    public function up()
    {
        Schema::table('receteitems', function (Blueprint $table) {
            $table->unsignedInteger('receteadi_id')->nullable();
            $table->foreign('receteadi_id', 'receteadi_fk_106745')->references('id')->on('recetelers');
        });
    }

    public function down()
    {
        Schema::table('receteitems', function (Blueprint $table) {
        });
    }
}
