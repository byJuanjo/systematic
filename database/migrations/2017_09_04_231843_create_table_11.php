<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable11 extends Migration{
  public function up(){
    Schema::create('modulos_ofertas', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('modulos_id')->unsigned();
      $table->foreign('modulos_id')->references('id')->on('modulos');
      $table->integer('ofertasM_id')->unsigned();
      $table->foreign('ofertasM_id')->references('id')->on('ofertasM');
      $table->timestamps();
    });
  }
  public function down(){

  }
}
