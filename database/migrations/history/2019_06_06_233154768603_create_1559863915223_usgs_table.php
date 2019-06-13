<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559863915223UsgsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('usgs')) {
            Schema::create('usgs', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('takip_id')->nullable();
                $table->foreign('takip_id', 'takip_fk_94642')->references('id')->on('takiplers');
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

    public function down()
    {
        Schema::dropIfExists('usgs');
    }
}
