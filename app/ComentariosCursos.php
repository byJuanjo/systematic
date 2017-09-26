<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComentariosCursos extends Model{
  protected $table='comentarios_cursos';
  protected $fillable = [
    'comentarios_id','cursos_id'
  ];
  public function comentarios(){
    return $this->belongsTo('App\Comentarios');
  }
  public function cursos(){
      return $this->belongsTo('App\Cursos');
  }
}
