<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable9 extends Migration{
  public function up(){
    Schema::create('comentarios', function (Blueprint $table) {
      $table->increments('id');
      $table->date('descripcion');
      $table->integer('users_id')->unsigned();
      $table->foreign('users_id')->references('id')->on('users');
      $table->integer('respuesta_id');
      $table->timestamps();
    });
    Schema::create('comentarios_cursos', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('comentarios_id')->unsigned();
      $table->foreign('comentarios_id')->references('id')->on('comentarios');
      $table->integer('cursos_id')->unsigned();
      $table->foreign('cursos_id')->references('id')->on('cursos');
      $table->timestamps();
    });
  }
  public function down(){

  }
}
