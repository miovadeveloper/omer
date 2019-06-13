<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1560377243462TakiplersTable extends Migration
{
    public function up()
    {
        Schema::table('takiplers', function (Blueprint $table) {
            $table->dropColumn('bir_trimester_tarama');
            $table->dropColumn('iki_trimester_tarama');
        });
    }

    public function down()
    {
        Schema::table('takiplers', function (Blueprint $table) {
        });
    }
}
