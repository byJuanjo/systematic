<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model{
  protected $table='banner';
  protected $fillable = [
      'id', 'imagen1','textoa1','textoa2','textoa3','textoboton','imagen2','textob1','textob2','textob3','video','tipo'
  ];
}
