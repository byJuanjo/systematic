<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MdatosModulos extends Model{
  protected $table='mdatos_modulos';
  protected $fillable = [
    'modulos_id','cursos_id'
  ];
  public function modulos(){
    return $this->belongsTo('App\Modulos');
  }
  public function mdatos(){
      return $this->belongsTo('App\Mdatos');
  }
}
