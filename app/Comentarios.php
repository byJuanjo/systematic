<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model{
  protected $table='comentarios';
  protected $fillable = [
      'id','descripcion','fecha','respuesta','fecha_r','users_id','respuesta_id'
  ];
  public function cursos(){
    return $this->belongsToMany('App\Cursos');
  }
  public function user(){
    return $this->belongsTo('App\User');
  }
  public function scopeComentariosCurso($query,$cursos_id){
    $query->with('cursos')->orderBy('id','desc')
    ->whereHas('cursos',function($q) use($cursos_id){
      $q->where('cursos_id',$cursos_id);
    });
  }
  public function scopeComentariosUser($query,$userId){
    $query->with('cursos')->where('users_id',$userId)->orderBy('id','desc');
  }
  public function scopeComentariosPorResponder($query){
    $query->with('cursos')->where('respuesta','=','');
  }
}
