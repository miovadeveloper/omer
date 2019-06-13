<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559863197591DokumanlarsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('dokumanlars')) {
            Schema::create('dokumanlars', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('takip_id');
                $table->foreign('takip_id', 'takip_fk_94617')->references('id')->on('takiplers');
                $table->string('dosya_adi')->nullable();
                $table->date('tarih')->nullable();
                $table->longText('dosya_notu')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('dokumanlars');
    }
}
