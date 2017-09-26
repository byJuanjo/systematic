<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursosModulos extends Model{
  protected $table='cursos_modulos';
  protected $fillable = [
    'modulos_id','cursos_id'
  ];
  public function modulos(){
    return $this->belongsTo('App\Modulos');
  }
  public function cursos(){
      return $this->belongsTo('App\Cursos');
  }
}
