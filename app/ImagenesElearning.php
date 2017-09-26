<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenesElearning extends Model{
  protected $table='imagenes_elearning';
  protected $fillable = [
    'imagenes_id','elearning_id'
  ];
  public function imagenes(){
    return $this->belongsTo('App\Imagenes');
  }
  public function elearning(){
      return $this->belongsTo('App\Elearning');
  }
}
