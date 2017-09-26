<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
    protected $fillable = [
        'name','documento','razon_social','direccion','apellido','tipo','name_tipo', 'email','telefono','celular','ruta','password','fecha_nac','sexo'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function comentarios(){
      return $this->hasMany('App\Comentarios');
    }
    public function ventas(){
      return $this->hasMany('App\Ventas');
    }
    public function scopeAdmin($query){
      $query->where('tipo','1');
    }
    public function scopeBuscarDni($query,$dni){
      $query->where('documento',$dni);
    }
    public function scopeBuscarEmail($query,$user_id,$email){
      $query->where('id','<>',$user_id)->where('email',$email);
    }
    public function scopeBuscarNewEmail($query,$email){
      $query->where('email',$email);
    }
    public function ventas1(){
      return $this->belongsToMany('App\Ventas');
    }
}
