<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable14 extends Migration{
  public function up(){
    Schema::create('ventas', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('users_id')->unsigned();
      $table->foreign('users_id')->references('id')->on('users');
      $table->integer('vendedor_id');
      $table->integer('cursos_id')->unsigned();
      $table->foreign('cursos_id')->references('id')->on('cursos');
      $table->decimal('precio',10,2);
      $table->string('tipoVenta');
      $table->timestamps();
    });
    Schema::create('ventas_modulos', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('ventas_id')->unsigned();
      $table->foreign('ventas_id')->references('id')->on('ventas');
      $table->integer('modulos_id')->unsigned();
      $table->foreign('modulos_id')->references('id')->on('modulos');
      $table->integer('horarios_id')->unsigned();
      $table->foreign('horarios_id')->references('id')->on('horarios');
      $table->timestamps();
    });
    Schema::create('ventas_pagos', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('ventas_id')->unsigned();
      $table->foreign('ventas_id')->references('id')->on('ventas');
      $table->decimal('pago',10,2);
      $table->decimal('saldo',10,2);
      $table->timestamps();
    });
    Schema::create('ventas_participantes', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('users_id')->unsigned();
      $table->foreign('users_id')->references('id')->on('users');
      $table->integer('ventas_id')->unsigned();
      $table->foreign('ventas_id')->references('id')->on('ventas');
      $table->timestamps();
    });
  }
  public function down(){

  }
}
