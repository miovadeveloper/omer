<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceteitemsTable extends Migration
{
    public function up()
    {
        Schema::create('receteitems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kutuadeti')->nullable();
            $table->string('dbir')->nullable();
            $table->string('diki')->nullable();
            $table->string('zaman')->nullable();
            $table->string('kullanim')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
