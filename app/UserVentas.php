<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVentas extends Model{
  protected $table='user_ventas';
  protected $fillable = [
      'id', 'user_id','ventas_id'
  ];
  public function user(){
    return $this->belongsTo('App\User');
  }
  public function ventas(){
      return $this->belongsTo('App\Ventas');
  }
}
