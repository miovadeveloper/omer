<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIlaclarsTable extends Migration
{
    public function up()
    {
        Schema::create('ilaclars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ilac_adi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
