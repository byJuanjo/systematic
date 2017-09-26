<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valores extends Model{
  protected $table='valores';
  protected $fillable = [
      'id', 'titulo','html','img'
  ];
  public function imagenes(){
      return $this->belongsToMany('App\Imagenes');
  }
}
