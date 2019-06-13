<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1559862914020TakiplersTable extends Migration
{
    public function up()
    {
        Schema::table('takiplers', function (Blueprint $table) {
            $table->date('tarih')->nullable();
            $table->string('kilo_kg')->nullable();
            $table->string('vki')->nullable();
            $table->string('sat')->nullable();
            $table->string('boy_cm')->nullable();
            $table->longText('oyku')->nullable();
            $table->string('sat_emin')->nullable();
            $table->string('geb_haft_duzeltildi')->nullable();
            $table->longText('1_trimester_tarama')->nullable();
            $table->longText('genetik_inceleme')->nullable();
            $table->longText('fetal_dna')->nullable();
            $table->longText('fat')->nullable();
            $table->longText('2_trimester_tarama')->nullable();
            $table->longText('g_t_t')->nullable();
        });
    }

    public function down()
    {
        Schema::table('takiplers', function (Blueprint $table) {
        });
    }
}
