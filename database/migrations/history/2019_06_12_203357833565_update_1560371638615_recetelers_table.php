<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1560371638615RecetelersTable extends Migration
{
    public function up()
    {
        Schema::table('recetelers', function (Blueprint $table) {
            $table->string('receteadi')->nullable();
        });
    }

    public function down()
    {
        Schema::table('recetelers', function (Blueprint $table) {
        });
    }
}
