<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetelersTable extends Migration
{
    public function up()
    {
        Schema::create('recetelers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('receteadi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
