<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1560351730477HastaKategorilerisTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('hasta_kategorileris')) {
            Schema::create('hasta_kategorileris', function (Blueprint $table) {
                $table->increments('id');
                $table->string('hastak')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('hasta_kategorileris');
    }
}
