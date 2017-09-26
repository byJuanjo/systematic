<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mdatos extends Model{
  protected $table='mdatos';
  protected $fillable = [
      'id', 'titulo','descripcion'
  ];
  public function modulos(){
      return $this->belongsToMany('App\Modulos');
  }
  public function scopeBuscarCaracteristicas($query,$modulos_id){
    $query->with('modulos')
    ->whereHas('modulos',function($q) use($modulos_id){
      $q->where('modulos_id',$modulos_id);
    });
  }
}
