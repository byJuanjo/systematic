<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable12 extends Migration{
  public function up(){
    Schema::create('banner', function (Blueprint $table) {
      $table->increments('id');
      $table->string('imagen1');
      $table->string('textoa1');
      $table->string('textoa2');
      $table->string('textoa3');
      $table->string('textoboton');
      $table->string('imagen2');
      $table->string('textob1');
      $table->string('textob2');
      $table->string('textob3');
      $table->string('video');
      $table->string('tipo');
      $table->timestamps();
    });
  }
  public function down(){

  }
}
