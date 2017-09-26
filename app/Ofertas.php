<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ofertas extends Model{
  protected $table='ofertas';
  protected $fillable = [
      'id', 'curso_id','modulos_id1','modulos_id2','modulos_id3','precio','porcentaje','seleccionados'
  ];
  public function cursos(){
      return $this->belongsTo('App\Cursos');
  }
  public function modulos(){
    return $this->belongsToMany('App\Modulos');
  }
  public function scopeBuscarOfertas($query,$curso_id){
    $query->where('cursos_id',$curso_id);
  }
  public function scopeBuscarOfertasId($query,$oferta_id){
    $query->where('id',$oferta_id);
  }
  public function scopeOtrasOfertas($query,$oferta_id){
    $query->where('id','<>',$oferta_id);
  }
}
