<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1560377381743TakiplersTable extends Migration
{
    public function up()
    {
        Schema::table('takiplers', function (Blueprint $table) {
            $table->string('bir_trimaster')->nullable();
            $table->string('iki_trimaster')->nullable();
        });
    }

    public function down()
    {
        Schema::table('takiplers', function (Blueprint $table) {
        });
    }
}
