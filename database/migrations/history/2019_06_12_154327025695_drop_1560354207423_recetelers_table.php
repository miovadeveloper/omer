<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1560354207423RecetelersTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('recetelers');
    }
}
