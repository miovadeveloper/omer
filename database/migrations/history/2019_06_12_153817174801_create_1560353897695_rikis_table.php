<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1560353897695RikisTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('rikis')) {
            Schema::create('rikis', function (Blueprint $table) {
                $table->increments('id');
                $table->string('1')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('rikis');
    }
}
