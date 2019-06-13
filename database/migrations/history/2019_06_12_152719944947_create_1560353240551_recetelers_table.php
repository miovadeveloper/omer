<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1560353240551RecetelersTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('recetelers')) {
            Schema::create('recetelers', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('hasta_id')->nullable();
                $table->foreign('hasta_id', 'hasta_fk_105943')->references('id')->on('hastalars');
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
