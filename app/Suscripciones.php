<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suscripciones extends Model{
  protected $table='suscripciones';
  protected $fillable = [
      'id', 'nombre','email','celular','activo','cursos_id'
  ];
  public function cursos(){
    return $this->belongsTo('App\Cursos');
  }
  public function scopeBuscarSuscripcion($query,$email){
    $query->where('email',$email);
  }
  public function scopeTodos($query){
    $query->where('id','<>',0);
  }
}
