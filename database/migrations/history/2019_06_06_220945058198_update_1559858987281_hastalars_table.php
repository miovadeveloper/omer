<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1559858987281HastalarsTable extends Migration
{
    public function up()
    {
        Schema::table('hastalars', function (Blueprint $table) {
            $table->dropColumn('t_c_kimlik_no');
            $table->dropColumn('te');
        });
        Schema::table('hastalars', function (Blueprint $table) {
            $table->string('tc_kimlik_no')->nullable();
            $table->string('ozgecmis_ve_soygecmis_notlari')->nullable();
        });
    }

    public function down()
    {
        Schema::table('hastalars', function (Blueprint $table) {
        });
    }
}
