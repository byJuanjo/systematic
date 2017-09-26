<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model{
  protected $table='horarios';
  protected $fillable = [
      'id', 'laboratorios_id','docentes_id','hora_general','hora_generalf',
      'lunes','lunes_hora','lunes_horaf',
      'martes','martes_hora','martes_horaf',
      'miercoles','miercoles_hora','miercoles_horaf',
      'jueves','jueves_hora','jueves_horaf',
      'viernes','viernes_hora','viernes_horaf',
      'sabado','sabado_hora','sabado_horaf',
      'domingo','domingo_hora','domingo_horaf',
      'fecha_inicio','fecha_fin','fecha_muestra','fecha_finmuestra','cursos_id','modulos_id'
  ];
  public function laboratorios(){
    return $this->belongsTo('App\Laboratorios');
  }
  public function docentes(){
    return $this->belongsTo('App\Docentes');
  }
  public function cursos(){
    return $this->belongsTo('App\Cursos');
  }
  public function modulos(){
    return $this->belongsTo('App\Modulos');
  }
  public function modulosVentas(){
    return $this->hasMany('App\ModulosVentas');
  }
  public function scopeTodos($query){
    $query->with('laboratorios','docentes','cursos','modulos')->orderBy('id','desc');
  }
  public function scopeHorariosCurso($query,$id,$inicio){
    $query->with('laboratorios','docentes','cursos','modulos')->where('fecha_muestra','<=',$inicio)->where('fecha_finmuestra','>=',$inicio)->where('cursos_id',$id);
  }
  public function scopeHorariosModulo($query,$id,$inicio){
    $query->with('laboratorios','docentes','cursos','modulos')->where('fecha_muestra','<',$inicio)->where('fecha_finmuestra','>=',$inicio)->where('modulos_id',$id);
  }
}
