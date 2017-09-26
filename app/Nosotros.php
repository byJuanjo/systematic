<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nosotros extends Model{
  protected $table='nosotros';
  protected $fillable = [
      'id', 'titulo','html','titulo1','html1','titulo2','html2'
  ];
  public function imagenes(){
      return $this->belongsToMany('App\Imagenes');
  }
}
