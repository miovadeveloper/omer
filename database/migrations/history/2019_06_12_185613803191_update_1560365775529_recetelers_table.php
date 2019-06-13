<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1560365775529RecetelersTable extends Migration
{
    public function up()
    {
        Schema::table('recetelers', function (Blueprint $table) {
            $table->dropForeign('bir_fk_106068');
            $table->dropColumn('bir_id');
            $table->dropColumn('biraciklama');
            $table->dropForeign('iki_fk_106070');
            $table->dropColumn('iki_id');
            $table->dropColumn('ikiaciklama');
            $table->dropForeign('uc_fk_106072');
            $table->dropColumn('uc_id');
            $table->dropColumn('ucaciklama');
            $table->dropForeign('dort_fk_106074');
            $table->dropColumn('dort_id');
        });
        Schema::table('recetelers', function (Blueprint $table) {
            $table->unsignedInteger('takip_id')->nullable();
            $table->foreign('takip_id', 'takip_fk_106453')->references('id')->on('takiplers');
            $table->unsignedInteger('hasta_id')->nullable();
            $table->foreign('hasta_id', 'hasta_fk_106454')->references('id')->on('hastalars');
        });
    }

    public function down()
    {
        Schema::table('recetelers', function (Blueprint $table) {
        });
    }
}
