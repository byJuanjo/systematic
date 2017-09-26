<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\User;
use App\Categorias;
use App\Cursos;
use App\Comentarios;

class PerfilController extends Controller{
  public function __construct(){
    $this->middleware('auth');
  }
  public function index(){
    $categorias=Categorias::all();
    $cursos=Cursos::all();
    $tipo=Auth::user()->tipo;
    $userId=Auth::user()->id;
    $user=User::find($userId);
    $userAdmin=User::Admin()->get();
    if($tipo=='1'){
      $comentarios=Comentarios::ComentariosPorResponder()->get();
      return view('perfil.indexAdmin')
      ->with('user',$user)
      ->with('userAdmin',$userAdmin)
      ->with('categorias',$categorias)
      ->with('cursos',$cursos)
      ->with('comentarios',$comentarios);
    }else if($tipo=='2'){ //USUARIO COMUN
      $comentarios=Comentarios::ComentariosUser($userId)->get();
      return view('perfil.indexUser')
      ->with('user',$user)
      ->with('categorias',$categorias)
      ->with('cursos',$cursos)
      ->with('comentarios',$comentarios);
    }else if($tipo=='3'){ // USUARIO CORPORATIVO
      $comentarios=Comentarios::ComentariosUser($userId)->get();
      return view('perfil.indexEmp')
      ->with('user',$user)
      ->with('categorias',$categorias)
      ->with('cursos',$cursos)
      ->with('comentarios',$comentarios);
    }
  }
  public function store(Request $request){
    $user=new User();
    $user->fill($request->all());
    $user->tipo='1';
    if($request->ruta){
      $carbon = new \Carbon\Carbon();
      $date = $carbon->now();
      $formato=$date->format('dmYHis');
      $nuevo_nombre=$formato.".jpg";
      $file = Input::file('ruta');
      $image = \Image::make(Input::file('ruta'));
      $path = 'img/profile/';
      $image->encode('jpg',75);
      $image->resize(128,128);
      $image->save($path.$nuevo_nombre,60);
      $user->ruta=$nuevo_nombre;
    }

    if($user->save()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
  public function guardarDataUser(Request $request){
    $id=$request->id;
    $user=User::find($id);
    $user->fill($request->all());
    $user->razon_social=$request->name.' '.$request->apellido;

    if($request->ruta){
      $carbon = new \Carbon\Carbon();
      $date = $carbon->now();
      $formato=$date->format('dmYHis');
      $nuevo_nombre=$formato.".jpg";
      $file = Input::file('ruta');
      $image = \Image::make(Input::file('ruta'));
      $path = 'img/profile/';
      $image->encode('jpg',75);
      $image->resize(128,128);
      $image->save($path.$nuevo_nombre,60);
      $user->ruta=$nuevo_nombre;
    }
    if($user->save()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
  public function descAdmin(){
    $userId=Auth::user()->id;
    $tipo=Auth::user()->tipo;
    $user=User::find($userId);
    $userAdmin=User::Admin()->get();
    if($tipo=='1' or $tipo=='2'){
      return view('perfil.descAdmin')
      ->with('user',$user)
      ->with('userAdmin',$userAdmin);
    }else if($tipo=='3'){
      return view('perfil.corp.descAdmin')
      ->with('user',$user)
      ->with('userAdmin',$userAdmin);
    }
  }
  public function formViewAdd(){
    $userAdmin=User::Admin()->get();
    return view('perfil.formAdd')
    ->with('userAdmin',$userAdmin);
  }
  public function listPermisos($userId){
    $userId=User::find($userId);
    return view('perfil.listPermisos')
    ->with('userId',$userId);
  }
  public function conceder(Request $request){
    $user_id=$request->user_id;
    if($request->estado=='true'){
      $estado='1';
    }else{
      $estado='0';
    }
    $id=$request->id;
    $user=User::find($user_id);
    $user->$id=$estado;
    $user->save();
    if($request->estado=='true'){
      return 1;
    }else{
      return 2;
    }
    return 1;
  }
  public function formViewEdit($user_id){
    $userId=User::find($user_id);
    return view('perfil.formEdit')
    ->with('userId',$userId);
  }
  public function activarUser(Request $request){
    $user_id=$request->user_id;
    $userId=User::find($user_id);
    $userId->estado=$request->estado;
    if($userId->save()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
}
