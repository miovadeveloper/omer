<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsgsTable extends Migration
{
    public function up()
    {
        Schema::create('usgs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tarih')->nullable();
            $table->string('sag_over')->nullable();
            $table->string('sol_over')->nullable();
            $table->string('uterus')->nullable();
            $table->string('usg_tipi')->nullable();
            $table->longText('not')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
