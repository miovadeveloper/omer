<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559862090671TakiplersTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('takiplers')) {
            Schema::create('takiplers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('takip_tipi');
                $table->unsignedInteger('hasta_id');
                $table->foreign('hasta_id', 'hasta_fk_94586')->references('id')->on('hastalars');
                $table->date('baslangic')->nullable();
                $table->date('bitis_tarihi')->nullable();
                $table->longText('sonuc_notu')->nullable();
                $table->longText('oneri')->nullable();
                $table->boolean('durum')->default(0)->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('takiplers');
    }
}
