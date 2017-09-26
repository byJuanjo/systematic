<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certiport extends Model{
  protected $table='certiport';
  protected $fillable = [
      'id', 'titulo','html'
  ];
  public function imagenes(){
      return $this->belongsToMany('App\Imagenes');
  }
}
