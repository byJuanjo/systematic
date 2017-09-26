<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable3 extends Migration{
  public function up(){
    Schema::create('categorias', function (Blueprint $table) {
      $table->increments('id');
      $table->string('descripcion');
      $table->timestamps();
    });
    Schema::create('tipos', function (Blueprint $table) {
      $table->increments('id');
      $table->string('descripcion');
      $table->timestamps();
    });
    Schema::table('cursos', function (Blueprint $table) {
      $table->integer('categorias_id')->unsigned();
      $table->foreign('categorias_id')->references('id')->on('categorias');
      $table->integer('tipos_id')->unsigned();
      $table->foreign('tipos_id')->references('id')->on('tipos');
    });
  }
  public function down(){

  }
}
