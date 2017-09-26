<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenes extends Migration{
    public function up(){
      Schema::create('imagenes', function (Blueprint $table) {
        $table->increments('id');
        $table->string('ruta');
        $table->timestamps();
      });a
      Schema::create('imagenes_nosotros', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('imagenes_id')->unsigned();
        $table->foreign('imagenes_id')->references('id')->on('imagenes');
        $table->integer('nosotros_id')->unsigned();
        $table->foreign('nosotros_id')->references('id')->on('nosotros');
        $table->timestamps();
      });
      Schema::create('imagenes_infraestructura', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('imagenes_id')->unsigned();
        $table->foreign('imagenes_id')->references('id')->on('imagenes');
        $table->integer('infraestructura_id')->unsigned();
        $table->foreign('infraestructura_id')->references('id')->on('infraestructura');
        $table->timestamps();
      });
      Schema::create('imagenes_certiport', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('imagenes_id')->unsigned();
        $table->foreign('imagenes_id')->references('id')->on('imagenes');
        $table->integer('certiport_id')->unsigned();
        $table->foreign('certiport_id')->references('id')->on('certiport');
        $table->timestamps();
      });
      Schema::create('imagenes_elearning', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('imagenes_id')->unsigned();
        $table->foreign('imagenes_id')->references('id')->on('imagenes');
        $table->integer('elearning_id')->unsigned();
        $table->foreign('elearning_id')->references('id')->on('elearning');
        $table->timestamps();
      });
      Schema::create('imagenes_valor', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('imagenes_id')->unsigned();
        $table->foreign('imagenes_id')->references('id')->on('imagenes');
        $table->integer('valor_id')->unsigned();
        $table->foreign('valor_id')->references('id')->on('valor');
        $table->timestamps();
      });
    }
    public function down(){

    }
}
