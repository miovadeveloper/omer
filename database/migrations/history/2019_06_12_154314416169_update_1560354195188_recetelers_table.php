<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1560354195188RecetelersTable extends Migration
{
    public function up()
    {
        Schema::table('recetelers', function (Blueprint $table) {
            $table->dropForeign('hasta_fk_105943');
            $table->dropColumn('hasta_id');
            $table->dropForeign('durum_fk_105952');
            $table->dropColumn('durum_id');
            $table->dropForeign('1_fk_105953');
            $table->dropColumn('1_id');
            $table->dropColumn('1_a');
            $table->dropForeign('2_fk_105955');
            $table->dropColumn('2_id');
            $table->dropColumn('2_a');
            $table->dropForeign('3_fk_105957');
            $table->dropColumn('3_id');
            $table->dropColumn('3_a');
            $table->dropForeign('4_fk_105959');
            $table->dropColumn('4_id');
            $table->dropColumn('4_a');
            $table->dropForeign('5_fk_105961');
            $table->dropColumn('5_id');
            $table->dropColumn('5_a');
            $table->dropForeign('6_fk_105963');
            $table->dropColumn('6_id');
            $table->dropColumn('6_a');
            $table->dropForeign('7_fk_105965');
            $table->dropColumn('7_id');
            $table->dropColumn('7_a');
            $table->dropForeign('8_fk_105967');
            $table->dropColumn('8_id');
            $table->dropColumn('8_a');
            $table->dropForeign('9_fk_105969');
            $table->dropColumn('9_id');
            $table->dropColumn('9_a');
            $table->dropForeign('10_fk_105971');
            $table->dropColumn('10_id');
            $table->dropColumn('10_a');
        });
        Schema::table('recetelers', function (Blueprint $table) {
            $table->string('o')->nullable();
        });
    }

    public function down()
    {
        Schema::table('recetelers', function (Blueprint $table) {
        });
    }
}
