<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable6 extends Migration{
  public function up(){
    Schema::create('imagenes_modulos', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('imagenes_id')->unsigned();
      $table->foreign('imagenes_id')->references('id')->on('imagenes');
      $table->integer('modulos_id')->unsigned();
      $table->foreign('modulos_id')->references('id')->on('modulos');
      $table->timestamps();
    });
  }
  public function down(){

  }
}
