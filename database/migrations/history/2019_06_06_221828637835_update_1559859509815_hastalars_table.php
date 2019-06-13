<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1559859509815HastalarsTable extends Migration
{
    public function up()
    {
        Schema::table('hastalars', function (Blueprint $table) {
            $table->dropColumn('ozgecmis_ve_soygecmis_notlari');
        });
        Schema::table('hastalars', function (Blueprint $table) {
            $table->string('sigara')->nullable();
            $table->string('ilaclar')->nullable();
            $table->longText('ozgecmis_ve_soygecmis_notlari')->nullable();
            $table->longText('uyarilar')->nullable();
            $table->string('esinin_hastaliklar')->nullable();
            $table->string('esinin_operasyonlar')->nullable();
            $table->string('esinin_allerjileri')->nullable();
            $table->string('esinin_alkol_kullanimi')->nullable();
            $table->string('esinin_sigara_kullanimi')->nullable();
            $table->longText('esinin_ozgecmis_ve_soygecmis_notlari')->nullable();
            $table->string('unvan')->nullable();
            $table->string('vergi_dairesi')->nullable();
            $table->string('vergi_no')->nullable();
            $table->longText('fatura_adresi')->nullable();
        });
    }

    public function down()
    {
        Schema::table('hastalars', function (Blueprint $table) {
        });
    }
}
