<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model{
  protected $table='ventas';
  protected $fillable = [
      'id', 'users_id','vendedor_id','cursos_id','precio','tipoVenta',
  ];
  public function user(){
    return $this->belongsTo('App\User');
  }
  public function cursos(){
    return $this->belongsTo('App\Cursos');
  }
  public function pagos(){
    return $this->hasMany('App\Pagos');
  }
  public function modulosVentas(){
    return $this->hasMany('App\ModulosVentas');
  }
  public function user1(){
    return $this->belongsToMany('App\User');
  }
}
