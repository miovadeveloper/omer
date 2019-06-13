<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1560375403698HastalarsTable extends Migration
{
    public function up()
    {
        Schema::table('hastalars', function (Blueprint $table) {
            $table->dropForeign('hastak_fk_105895');
            $table->dropColumn('hastak_id');
        });
    }

    public function down()
    {
        Schema::table('hastalars', function (Blueprint $table) {
        });
    }
}
