<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenesValor extends Model{
  protected $table='imagenes_valor';
  protected $fillable = [
    'imagenes_id','valor_id'
  ];
  public function imagenes(){
    return $this->belongsTo('App\Imagenes');
  }
  public function valor(){
      return $this->belongsTo('App\Valor');
  }
}
