<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuarioFO')->unsigned();
            //$table->foreign('id_usuarioFO')->references('id')->on('users');
            $table->string('tituProdu');
            $table->text('ingredientes')->nullable();
            $table->text('promocion')->nullable();
            $table->text('precio')->nullable();
            $table->text('etiket1')->nullable();
            $table->text('etiket2')->nullable();
            $table->text('etiket3')->nullable();
            $table->text('etiket4')->nullable();
            $table->string('localidad')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
