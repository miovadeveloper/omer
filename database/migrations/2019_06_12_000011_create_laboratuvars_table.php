<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratuvarsTable extends Migration
{
    public function up()
    {
        Schema::create('laboratuvars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tetkik_adi')->nullable();
            $table->longText('tetkik_detaylari')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
