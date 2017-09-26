<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable1 extends Migration{
  public function up(){
    Schema::create('cursos', function (Blueprint $table) {
      $table->increments('id');
      $table->string('titulo');
      $table->decimal('precio1',10,2);
      $table->integer('activo1');
      $table->decimal('precio2',10,2);
      $table->integer('activo2');
      $table->decimal('precio3',10,2);
      $table->integer('activo3');
      $table->string('descripcion_corta');
      $table->string('categoria');
      $table->string('tipo');
      $table->text('descripcion');
      $table->text('dirigido');
      $table->text('finalizado');
      $table->text('acreditaciones');
      $table->timestamps();
    });
    Schema::create('cursos_imagenes', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('imagenes_id')->unsigned();
      $table->foreign('imagenes_id')->references('id')->on('imagenes');
      $table->integer('cursos_id')->unsigned();
      $table->foreign('cursos_id')->references('id')->on('cursos');
      $table->timestamps();
    });
  }
  public function down(){

  }
}
