<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1560355168742RecetelersTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('recetelers')) {
            Schema::create('recetelers', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('bir_id')->nullable();
                $table->foreign('bir_id', 'bir_fk_106068')->references('id')->on('ilaclars');
                $table->string('biraciklama')->nullable();
                $table->unsignedInteger('iki_id')->nullable();
                $table->foreign('iki_id', 'iki_fk_106070')->references('id')->on('ilaclars');
                $table->string('ikiaciklama')->nullable();
                $table->unsignedInteger('uc_id')->nullable();
                $table->foreign('uc_id', 'uc_fk_106072')->references('id')->on('ilaclars');
                $table->string('ucaciklama')->nullable();
                $table->unsignedInteger('dort_id')->nullable();
                $table->foreign('dort_id', 'dort_fk_106074')->references('id')->on('ilaclars');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('recetelers');
    }
}
