<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakiplersTable extends Migration
{
    public function up()
    {
        Schema::create('takiplers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('takip_tipi');
            $table->date('baslangic')->nullable();
            $table->date('bitis_tarihi')->nullable();
            $table->longText('sonuc_notu')->nullable();
            $table->longText('oneri')->nullable();
            $table->boolean('durum')->default(0)->nullable();
            $table->date('tarih')->nullable();
            $table->string('kilo_kg')->nullable();
            $table->string('vki')->nullable();
            $table->string('sat')->nullable();
            $table->string('boy_cm')->nullable();
            $table->longText('oyku')->nullable();
            $table->string('sat_emin')->nullable();
            $table->string('geb_haft_duzeltildi')->nullable();
            $table->longText('genetik_inceleme')->nullable();
            $table->longText('fetal_dna')->nullable();
            $table->longText('fat')->nullable();
            $table->longText('g_t_t')->nullable();
            $table->string('bir_trimaster')->nullable();
            $table->string('iki_trimaster')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
