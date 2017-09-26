<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable5 extends Migration{
    public function up(){
      Schema::create('modulos', function (Blueprint $table) {
        $table->increments('id');
        $table->string('titulo');
        $table->timestamps();
      });
      Schema::create('mdatos', function (Blueprint $table) {
        $table->increments('id');
        $table->string('titulo');
        $table->string('descripcion');
        $table->timestamps();
      });
      Schema::create('modulos_mdatos', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('modulos_id')->unsigned();
        $table->foreign('modulos_id')->references('id')->on('modulos');
        $table->integer('mdatos_id')->unsigned();
        $table->foreign('mdatos_id')->references('id')->on('mdatos');
        $table->timestamps();
      });
      Schema::create('cursos_modulos', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('cursos_id')->unsigned();
        $table->foreign('cursos_id')->references('id')->on('cursos');
        $table->integer('modulos_id')->unsigned();
        $table->foreign('modulos_id')->references('id')->on('modulos');
        $table->timestamps();
      });
    }
    public function down(){

    }
}
