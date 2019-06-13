<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559858608951HastalarsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('hastalars')) {
            Schema::create('hastalars', function (Blueprint $table) {
                $table->increments('id');
                $table->string('adi_soyadi')->nullable();
                $table->string('t_c_kimlik_no')->nullable();
                $table->date('ilk_gelis_tarihi')->nullable();
                $table->date('dogum_tarihi')->nullable();
                $table->integer('telefon_ev')->nullable();
                $table->integer('gsm')->nullable();
                $table->string('e_posta')->nullable();
                $table->string('meslek')->nullable();
                $table->string('dogum_yeri')->nullable();
                $table->string('kan_grubu')->nullable();
                $table->string('referans')->nullable();
                $table->string('sosyal_guvence')->nullable();
                $table->string('ozel_sigorta')->nullable();
                $table->string('medeni_durum')->nullable();
                $table->longText('adres')->nullable();
                $table->string('sehir')->nullable();
                $table->string('esinin_adi_soyadi')->nullable();
                $table->string('esinin_dogum_tarihi')->nullable();
                $table->string('esinin_dogum_yeri')->nullable();
                $table->string('esinin_meslegi')->nullable();
                $table->string('esinin_kan_grubu')->nullable();
                $table->string('esinin_sosyal_guvence')->nullable();
                $table->integer('esinin_telefonu')->nullable();
                $table->string('esinin_eposta')->nullable();
                $table->string('virgo')->nullable();
                $table->string('pms')->nullable();
                $table->string('dismenore')->nullable();
                $table->string('akraba_evliligi')->nullable();
                $table->string('derecesi')->nullable();
                $table->string('jinekolojik_anomali')->nullable();
                $table->integer('menars_yasi')->nullable();
                $table->integer('gun')->nullable();
                $table->integer('sure')->nullable();
                $table->integer('miktar')->nullable();
                $table->string('gebelik')->nullable();
                $table->string('dogum')->nullable();
                $table->string('dusuk')->nullable();
                $table->string('kurtaj')->nullable();
                $table->string('yasayan')->nullable();
                $table->string('dis_gebelik')->nullable();
                $table->string('hastaliklar')->nullable();
                $table->string('operasyonlar')->nullable();
                $table->string('allerji')->nullable();
                $table->string('alkol')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('hastalars');
    }
}
