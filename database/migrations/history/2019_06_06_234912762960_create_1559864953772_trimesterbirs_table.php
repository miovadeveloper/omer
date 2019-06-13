<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559864953772TrimesterbirsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('trimesterbirs')) {
            Schema::create('trimesterbirs', function (Blueprint $table) {
                $table->increments('id');
                $table->date('tarih')->nullable();
                $table->string('gebelik_kesesi')->nullable();
                $table->string('yolk_kesesi')->nullable();
                $table->string('mide')->nullable();
                $table->string('mesane')->nullable();
                $table->string('icd_kodu')->nullable();
                $table->date('crl_tarih')->nullable();
                $table->string('crl')->nullable();
                $table->string('crl_gun')->nullable();
                $table->string('fka_vuru_dk')->nullable();
                $table->string('nt')->nullable();
                $table->string('nazal_kemik')->nullable();
                $table->string('randevu_tipi')->nullable();
                $table->string('ta')->nullable();
                $table->string('kilo')->nullable();
                $table->longText('notlar')->nullable();
                $table->unsignedInteger('takip_id')->nullable();
                $table->foreign('takip_id', 'takip_fk_94695')->references('id')->on('takiplers');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('trimesterbirs');
    }
}
