<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model{
  protected $table='imagenes';
  protected $fillable = [
      'id', 'ruta'
  ];
  public function nosotros(){
    return $this->belongsToMany('App\Nosotros');
  }
  public function infraestructura(){
    return $this->belongsToMany('App\Infraestructura');
  }
  public function elearning(){
    return $this->belongsToMany('App\Elearning');
  }
  public function certiport(){
    return $this->belongsToMany('App\Certiport');
  }
  public function valor(){
    return $this->belongsToMany('App\Valor');
  }
  public function cursos(){
      return $this->belongsToMany('App\Cursos');
  }
  public function scopeBuscarImagenes($query,$cursos_id){
    $query->with('cursos')
    ->whereHas('cursos',function($q) use($cursos_id){
      $q->where('cursos_id',$cursos_id);
    });
  }
}
