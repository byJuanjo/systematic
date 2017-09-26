<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTable15 extends Migration{
    public function up(){
      Schema::create('modulos_ventas', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('modulos_id')->unsigned();
        $table->foreign('modulos_id')->references('id')->on('modulos');
        $table->integer('ventas_id')->unsigned();
        $table->foreign('ventas_id')->references('id')->on('ventas');
        $table->integer('horarios_id')->unsigned();
        $table->foreign('horarios_id')->references('id')->on('horarios');
        $table->timestamps();
      });
      Schema::create('pagos', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('ventas_id')->unsigned();
        $table->foreign('ventas_id')->references('id')->on('ventas');
        $table->decimal('pago',10,2);
        $table->decimal('saldo',10,2);
        $table->timestamps();
      });
      Schema::create('user_ventas', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users');
        $table->integer('ventas_id')->unsigned();
        $table->foreign('ventas_id')->references('id')->on('ventas');
        $table->timestamps();
      });
    }
    public function down(){

    }
}
