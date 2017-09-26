<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model{
  protected $table='categorias';
  protected $fillable = [
      'id', 'descripcion'
  ];
  public function cursos(){
      return $this->hasMany('App\Cursos');
  }
}
