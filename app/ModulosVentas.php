<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ModulosVentas extends Model{
  protected $table='modulos_ventas';
  protected $fillable = [
    'modulos_id','ventas_id','horarios_id'
  ];
  public function modulos(){
    return $this->belongsTo('App\Modulos');
  }
  public function ventas(){
      return $this->belongsTo('App\Ventas');
  }
  public function horarios(){
      return $this->belongsTo('App\Horarios');
  }
}
