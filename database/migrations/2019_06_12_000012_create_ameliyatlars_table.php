<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmeliyatlarsTable extends Migration
{
    public function up()
    {
        Schema::create('ameliyatlars', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tarih')->nullable();
            $table->string('ameliyat_adi')->nullable();
            $table->longText('ameliyat_aciklama')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
