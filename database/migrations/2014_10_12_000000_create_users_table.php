<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->nullable();
            $table->string('name');
            $table->string('apellidos')->nullable();
            $table->string('email')->unique();
            $table->string('sexo')->nullable();
            $table->date('fechaNac')->nullable();
            $table->string('password');
            $table->string('llave_acti')->nullable();
            $table->boolean('validado')->default(false);
            //$table->string('provider')->nullable();
            //$table->string('provider_id')->nullable()->unique();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
