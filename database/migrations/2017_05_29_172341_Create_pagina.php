<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagina extends Migration{
    public function up(){
      Schema::create('nosotros', function (Blueprint $table) {
        $table->increments('id');
        $table->string('titulo');
        $table->string('html');
        $table->timestamps();
      });
      Schema::create('infraestructura', function (Blueprint $table) {
        $table->increments('id');
        $table->string('titulo');
        $table->string('html');
        $table->timestamps();
      });
      Schema::create('certiport', function (Blueprint $table) {
        $table->increments('id');
        $table->string('titulo');
        $table->string('html');
        $table->string('img');
        $table->timestamps();
      });
      Schema::create('elearning', function (Blueprint $table) {
        $table->increments('id');
        $table->string('titulo');
        $table->string('html');
        $table->timestamps();
      });
      Schema::create('valor', function (Blueprint $table) {
        $table->increments('id');
        $table->string('titulo');
        $table->string('html');
        $table->string('img');
        $table->timestamps();
      });
    }
    public function down(){

    }
}
