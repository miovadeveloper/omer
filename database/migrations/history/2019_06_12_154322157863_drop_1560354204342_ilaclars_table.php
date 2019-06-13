<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1560354204342IlaclarsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('ilaclars');
    }
}
