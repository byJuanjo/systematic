<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulos extends Model{
  protected $table='modulos';
  protected $fillable = [
      'id', 'titulo','precio'
  ];
  public function cursos(){
      return $this->belongsToMany('App\Cursos');
  }
  public function mdatos(){
      return $this->belongsToMany('App\Mdatos');
  }
  public function horarios(){
    return $this->hasMany('App\Horarios');
  }
  public function ofertas(){
    return $this->belongsToMany('App\Ofertas');
  }
  public function modulosVentas(){
    return $this->hasMany('App\ModulosVentas');
  }
  public function scopeBuscarModulo($query,$cursos_id){
    $query->with('cursos')
    ->whereHas('cursos',function($q) use($cursos_id){
      $q->where('cursos_id',$cursos_id);
    });
  }
  public function scopeBuscarModuloId($query,$modulo_id){
    $query->where('id',$modulo_id);
  }
  public function scopeRelacionados($query,$curso_id,$modulo_id){
    $query->with('cursos')->where('id','<>',$modulo_id)
    ->whereHas('cursos',function($q) use($curso_id){
      $q->where('cursos_id',$curso_id);
    });
  }

}
