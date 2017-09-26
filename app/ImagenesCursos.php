<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenesCursos extends Model{
  protected $table='cursos_imagenes';
  protected $fillable = [
    'imagenes_id','cursos_id'
  ];
  public function imagenes(){
    return $this->belongsTo('App\Imagenes');
  }
  public function cursos(){
      return $this->belongsTo('App\Cursos');
  }
}
