<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infraestructura extends Model{
  protected $table='infraestructura';
  protected $fillable = [
      'id', 'titulo','html','titulo1','html1','titulo2','html2'
  ];
  public function imagenes(){
      return $this->belongsToMany('App\Imagenes');
  }
  public function scopeTodos($query){
    $query->with('imagenes');
  }
}
