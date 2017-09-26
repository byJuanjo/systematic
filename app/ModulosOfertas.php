<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModulosOfertas extends Model{
  protected $table='modulos_ofertas';
  protected $fillable = [
    'modulos_id','ofertas_id'
  ];
  public function modulos(){
    return $this->belongsTo('App\Modulos');
  }
  public function ofertas(){
      return $this->belongsTo('App\Ofertas');
  }
}
