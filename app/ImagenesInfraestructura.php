<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenesInfraestructura extends Model{
  protected $table='imagenes_infraestructura';
  protected $fillable = [
    'imagenes_id','infraestructura_id'
  ];
  public function imagenes(){
    return $this->belongsTo('App\Imagenes');
  }
  public function infraestrucrtura(){
      return $this->belongsTo('App\Infraestrucrtura');
  }
}
