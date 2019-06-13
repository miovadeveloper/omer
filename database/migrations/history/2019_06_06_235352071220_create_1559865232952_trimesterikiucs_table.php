<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559865232952TrimesterikiucsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('trimesterikiucs')) {
            Schema::create('trimesterikiucs', function (Blueprint $table) {
                $table->increments('id');
                $table->date('tarih')->nullable();
                $table->string('sat_ile_hafta')->nullable();
                $table->string('sat_ile_gun')->nullable();
                $table->string('kilo_kg')->nullable();
                $table->string('icd_kodu')->nullable();
                $table->string('usg_ile_hafta')->nullable();
                $table->string('usg_ile_gun')->nullable();
                $table->string('tansiyon')->nullable();
                $table->string('odem')->nullable();
                $table->string('sonuc')->nullable();
                $table->string('uterin_arter')->nullable();
                $table->string('servikal_kanal')->nullable();
                $table->string('yakinma')->nullable();
                $table->string('ultrason')->nullable();
                $table->string('randevu_tipi')->nullable();
                $table->unsignedInteger('takip_id')->nullable();
                $table->foreign('takip_id', 'takip_fk_94715')->references('id')->on('takiplers');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('trimesterikiucs');
    }
}
