<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model{
  protected $table='cursos';
  protected $fillable = [
      'id','activo' ,'titulo','precio1','tipo_desc','monto_desc','activo1','precio2','activo2','precio3','activo3',
      'descripcion_corta','categoria','categorias_id','tipos_id','descripcion','dirigido','finalizado','acreditaciones','bolita','relevancia'
  ];
  public function imagenes(){
    return $this->belongsToMany('App\Imagenes');
  }
  public function modulos(){
    return $this->belongsToMany('App\Modulos');
  }
  public function comentarios(){
    return $this->belongsToMany('App\Comentarios');
  }
  public function ofertas(){
    return $this->masMany('App\Ofertas');
  }
  public function ventas(){
    return $this->hasMany('App\Ventas');
  }
  public function suscripciones(){
    return $this->masMany('App\Suscripciones');
  }
  public function categorias(){
    return $this->belongsTo('App\Categorias');
  }
  public function tipos(){
    return $this->belongsTo('App\Tipos');
  }
  public function scopeListos($query){
    $query->where('categorias_id','<>','0')->where('tipos_id','<>','0')->where('activo','1')->orderBy('tipos_id','desc')->orderBy('relevancia','asc');
  }
  public function horarios(){
    return $this->hasMany('App\Horarios');
  }
  public function scopeTodos($query){
    $query->with('imagenes');
  }
  public function scopeRelacionados($query,$curso_id,$categorias_id){
    $query->where('id','<>',$curso_id)->where('categorias_id',$categorias_id)->where('activo','1');
  }

}
