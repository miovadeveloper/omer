<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1560353732001RecetelersTable extends Migration
{
    public function up()
    {
        Schema::table('recetelers', function (Blueprint $table) {
            $table->unsignedInteger('durum_id')->nullable();
            $table->foreign('durum_id', 'durum_fk_105952')->references('id')->on('takiplers');
            $table->unsignedInteger('1_id')->nullable();
            $table->foreign('1_id', '1_fk_105953')->references('id')->on('ilaclars');
            $table->string('1_a')->nullable();
            $table->unsignedInteger('2_id')->nullable();
            $table->foreign('2_id', '2_fk_105955')->references('id')->on('ilaclars');
            $table->string('2_a')->nullable();
            $table->unsignedInteger('3_id')->nullable();
            $table->foreign('3_id', '3_fk_105957')->references('id')->on('ilaclars');
            $table->string('3_a')->nullable();
            $table->unsignedInteger('4_id')->nullable();
            $table->foreign('4_id', '4_fk_105959')->references('id')->on('ilaclars');
            $table->string('4_a')->nullable();
            $table->unsignedInteger('5_id')->nullable();
            $table->foreign('5_id', '5_fk_105961')->references('id')->on('ilaclars');
            $table->string('5_a')->nullable();
            $table->unsignedInteger('6_id')->nullable();
            $table->foreign('6_id', '6_fk_105963')->references('id')->on('ilaclars');
            $table->string('6_a')->nullable();
            $table->unsignedInteger('7_id')->nullable();
            $table->foreign('7_id', '7_fk_105965')->references('id')->on('ilaclars');
            $table->string('7_a')->nullable();
            $table->unsignedInteger('8_id')->nullable();
            $table->foreign('8_id', '8_fk_105967')->references('id')->on('ilaclars');
            $table->string('8_a')->nullable();
            $table->unsignedInteger('9_id')->nullable();
            $table->foreign('9_id', '9_fk_105969')->references('id')->on('ilaclars');
            $table->string('9_a')->nullable();
            $table->unsignedInteger('10_id')->nullable();
            $table->foreign('10_id', '10_fk_105971')->references('id')->on('ilaclars');
            $table->string('10_a')->nullable();
        });
    }

    public function down()
    {
        Schema::table('recetelers', function (Blueprint $table) {
        });
    }
}
