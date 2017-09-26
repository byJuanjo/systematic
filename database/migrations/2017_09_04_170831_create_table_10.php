<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable10 extends Migration{
    public function up(){
      Schema::create('ofertas', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('cursos_id')->unsigned();
        $table->foreign('cursos_id')->references('id')->on('cursos');
        $table->integer('modulos_id1')->unsigned();
        $table->foreign('modulos_id1')->references('id')->on('modulos');
        $table->integer('modulos_id2')->unsigned();
        $table->foreign('modulos_id2')->references('id')->on('modulos');
        $table->integer('modulos_id3')->unsigned();
        $table->foreign('modulos_id3')->references('id')->on('modulos');
        $table->decimal('precio',10,2);
        $table->integer('porcentaje');
        $table->integer('seleccionados');
        $table->timestamps();
      });
    }
    public function down(){

    }
}
