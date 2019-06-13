<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559863806993AmeliyatlarsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('ameliyatlars')) {
            Schema::create('ameliyatlars', function (Blueprint $table) {
                $table->increments('id');
                $table->date('tarih')->nullable();
                $table->string('ameliyat_adi')->nullable();
                $table->longText('ameliyat_aciklama')->nullable();
                $table->unsignedInteger('takip_id')->nullable();
                $table->foreign('takip_id', 'takip_fk_94637')->references('id')->on('takiplers');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('ameliyatlars');
    }
}
