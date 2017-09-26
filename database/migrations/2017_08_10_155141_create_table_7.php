<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable7 extends Migration{
    public function up(){
      Schema::create('laboratorios', function (Blueprint $table) {
        $table->increments('id');
        $table->string('titulo');
        $table->string('descripcion');
        $table->string('ubicacion');
        $table->integer('capacidad');
        $table->timestamps();
      });
      Schema::create('docentes', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->string('apellido');
        $table->timestamps();
      });
      Schema::create('horarios', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('laboratorios_id')->unsigned();
        $table->foreign('laboratorios_id')->references('id')->on('laboratorios');
        $table->integer('docentes_id')->unsigned();
        $table->foreign('docentes_id')->references('id')->on('docentes');
        $table->dateTime('hora_general');
        $table->integer('lunes');
        $table->dateTime('lunes_hora');
        $table->integer('martes');
        $table->dateTime('martes_hora');
        $table->integer('miercoles');
        $table->dateTime('miercoles_hora');
        $table->integer('jueves');
        $table->dateTime('jueves_hora');
        $table->integer('viernes');
        $table->dateTime('viernes_hora');
        $table->integer('sabado');
        $table->dateTime('sabado_hora');
        $table->integer('domingo');
        $table->dateTime('domingo_hora');
        $table->date('fecha_inicio');
        $table->date('fecha_fin');
        $table->integer('cursos_id');
        $table->integer('modulos_id')->unsigned();
        $table->foreign('modulos_id')->references('id')->on('modulos');
        $table->timestamps();
      });
    }
    public function down(){

    }
}
