<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuarioFO')->unsigned();
            //$table->foreign('id_usuarioFO')->references('id')->on('users');
            $table->string('alias')->nullable();
            $table->string('tituloquest');
            $table->text('opinion')->nullable();
            $table->text('opci1')->nullable();
            $table->text('opci2')->nullable();
            $table->text('opci3')->nullable();
            $table->text('opci4')->nullable();
            $table->text('opci5')->nullable();
            $table->text('etiket1')->nullable();
            $table->text('etiket2')->nullable();
            $table->text('etiket3')->nullable();
            $table->text('etiket4')->nullable();
            $table->integer('cantidad')->nullable();
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
        Schema::dropIfExists('publicaciones');
    }
}
