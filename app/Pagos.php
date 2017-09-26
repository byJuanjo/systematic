<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model{
  protected $table='pagos';
  protected $fillable = [
      'id', 'ventas_id','pago','saldo'
  ];
  public function ventas(){
    return $this->belongsTo('App\Ventas');
  }
  public function scopeUltimoPago($query,$venta_historial_id){
    $query->where('ventas_id',$venta_historial_id)->orderBy('id','desc')->first()->amount;
  }
}
