<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elearning extends Model{
  protected $table='elearning';
  protected $fillable = [
      'id', 'titulo','html','img'
  ];

}
