<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1560353308751IlaclarsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('ilaclars')) {
            Schema::create('ilaclars', function (Blueprint $table) {
                $table->increments('id');
                $table->string('ad')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('ilaclars');
    }
}
