<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHastaKategorilerisTable extends Migration
{
    public function up()
    {
        Schema::create('hasta_kategorileris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hastak')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
