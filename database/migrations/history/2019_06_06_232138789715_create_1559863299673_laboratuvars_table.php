<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559863299673LaboratuvarsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('laboratuvars')) {
            Schema::create('laboratuvars', function (Blueprint $table) {
                $table->increments('id');
                $table->string('tetkik_adi')->nullable();
                $table->longText('tetkik_detaylari')->nullable();
                $table->unsignedInteger('takip_id')->nullable();
                $table->foreign('takip_id', 'takip_fk_94628')->references('id')->on('takiplers');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('laboratuvars');
    }
}
