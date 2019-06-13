<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotlarsTable extends Migration
{
    public function up()
    {
        Schema::create('notlars', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tarih')->nullable();
            $table->string('not')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
