<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable13 extends Migration{
    public function up(){
      Schema::table('Suscripciones', function (Blueprint $table) {
        $table->integer('cursos_id')->unsigned();
        $table->foreign('cursos_id')->references('id')->on('cursos');
      });
    }
    public function down(){

    }
}
