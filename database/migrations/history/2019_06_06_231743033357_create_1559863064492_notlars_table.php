<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559863064492NotlarsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('notlars')) {
            Schema::create('notlars', function (Blueprint $table) {
                $table->increments('id');
                $table->date('tarih')->nullable();
                $table->string('not')->nullable();
                $table->unsignedInteger('takip_id');
                $table->foreign('takip_id', 'takip_fk_94612')->references('id')->on('takiplers');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('notlars');
    }
}
