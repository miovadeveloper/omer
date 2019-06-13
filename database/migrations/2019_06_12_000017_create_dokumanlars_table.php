<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumanlarsTable extends Migration
{
    public function up()
    {
        Schema::create('dokumanlars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dosya_adi')->nullable();
            $table->date('tarih')->nullable();
            $table->longText('dosya_notu')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
