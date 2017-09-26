<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenesNosotros extends Model{
  protected $table='imagenes_nosotros';
  protected $fillable = [
    'imagenes_id','nosotros_id'
  ];
  public function imagenes(){
    return $this->belongsTo('App\Imagenes');
  }
  public function nosotros(){
      return $this->belongsTo('App\Nosotros');
  }
}
