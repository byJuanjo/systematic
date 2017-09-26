<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorios extends Model{
  protected $table='laboratorios';
  protected $fillable = [
      'id', 'titulo','descripcion','ubicacion','capacidad'
  ];
  public function horarios(){
    return $this->hasMany('App\Horarios');
  }
}
