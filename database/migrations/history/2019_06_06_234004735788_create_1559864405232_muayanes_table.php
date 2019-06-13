<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559864405232MuayanesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('muayanes')) {
            Schema::create('muayanes', function (Blueprint $table) {
                $table->increments('id');
                $table->date('tarih')->nullable();
                $table->date('sat')->nullable();
                $table->string('kilo_kg')->nullable();
                $table->string('boy_cm')->nullable();
                $table->string('vki')->nullable();
                $table->string('randevu_tipi')->nullable();
                $table->string('icd_kodu')->nullable();
                $table->longText('sikayet')->nullable();
                $table->longText('oyku')->nullable();
                $table->longText('jinekolojik_muayene')->nullable();
                $table->longText('tani')->nullable();
                $table->string('istenilen_tetkikler')->nullable();
                $table->longText('tedavi')->nullable();
                $table->longText('sonuc')->nullable();
                $table->string('smear_notlari')->nullable();
                $table->string('usg_tipi')->nullable();
                $table->string('sag_over')->nullable();
                $table->string('sol_over')->nullable();
                $table->string('uterus')->nullable();
                $table->string('usg_notu')->nullable();
                $table->string('diger_notlar')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('muayanes');
    }
}
