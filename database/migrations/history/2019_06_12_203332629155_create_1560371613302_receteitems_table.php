<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1560371613302ReceteitemsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('receteitems')) {
            Schema::create('receteitems', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('ilac_id')->nullable();
                $table->foreign('ilac_id', 'ilac_fk_106735')->references('id')->on('ilaclars');
                $table->string('kutuadeti')->nullable();
                $table->string('dbir')->nullable();
                $table->string('diki')->nullable();
                $table->string('zaman')->nullable();
                $table->string('kullanim')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('receteitems');
    }
}
