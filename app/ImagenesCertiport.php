<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenesCertiport extends Model{
  protected $table='imagenes_certiport';
  protected $fillable = [
    'imagenes_id','certiport_id'
  ];
  public function imagenes(){
    return $this->belongsTo('App\Imagenes');
  }
  public function certiport(){
      return $this->belongsTo('App\Certiport');
  }
}
