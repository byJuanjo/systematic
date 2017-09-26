<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docentes extends Model{
  protected $table='docentes';
  protected $fillable = [
      'id', 'nombre','apellido'
  ];
  public function horarios(){
    return $this->hasMany('App\Horarios');
  }
}
