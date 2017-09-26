<?php

namespace App\Http\Controllers;
USE Auth;
use Storage;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Categorias;
use App\Cursos;
use App\Valores;

class ValoresController extends Controller{
  public function __construct(){
    $this->middleware('auth',['except' => ['index']]);
  }
  public function index(){
    $categorias=Categorias::all();
    $cursos=Cursos::all();
    $valores=Valores::all();
    return view('pagina.valores')
    ->with('categorias',$categorias)
    ->with('cursos',$cursos)
    ->with('valores',$valores);
  }
  public function store(Request $request){
    $id=$request->id_img;
    $carbon = new \Carbon\Carbon();
    $date = $carbon->now();
    $formato=$date->format('dmYHis');
    $archivo = $request->file('img');
    $input  = array('image' => $archivo) ;
    $reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png|max:1024');
    $validacion = Validator::make($input, $reglas);
    if ($validacion->fails()){
      return response()->json([
        "mensaje" => "2"
      ]);
    }else{
      $nombre_original=$archivo->getClientOriginalName();
      $extension=$archivo->getClientOriginalExtension();
      $nuevo_nombre=$formato.".jpg";
      $file1 = Input::file('img');
      $image1 = \Image::make(Input::file('img'));
      $path1 = 'img/valores/';
      $image1->encode('jpg',75);
      $image1->save($path1.$nuevo_nombre,60);
      $rutadelaimagen=$nuevo_nombre;
      if ($image1->save($path1.$nuevo_nombre,60)){
        $titulo=$request->titulo_add;
        $html=$request->html_add;
        $valor=new Valores();
        $valor->titulo=$titulo;
        $valor->html=$html;
        $valor->img=$rutadelaimagen;
        if($valor->save()){
          return response()->json([
            "mensaje" => "1"
          ]);
        }
      }else{
      }
    }
  }
  public function descripcion(){
    $valores=Valores::all();
    return view('pagina.valores.descripcion')
    ->with('valores',$valores);
  }
  public function show($id){
    $valores=Valores::Find($id);
    return view('pagina.valores.edit')
    ->with('valor',$valores);
  }
  public function update1(Request $request){
    $id=$request->id;
    $carbon = new \Carbon\Carbon();
    $date = $carbon->now();
    $formato=$date->format('dmYHis');
    $archivo = $request->file('img');
    $input  = array('image' => $archivo) ;
    $reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png|max:1024');
    $validacion = Validator::make($input, $reglas);
    if ($validacion->fails()){
      return response()->json([
        "mensaje" => "2"
      ]);
    }else{
      $nombre_original=$archivo->getClientOriginalName();
      $extension=$archivo->getClientOriginalExtension();
      $nuevo_nombre=$formato.".jpg";
      $file1 = Input::file('img');
      $image1 = \Image::make(Input::file('img'));
      $path1 = 'img/valores/';
      $image1->encode('jpg',75);
      $image1->save($path1.$nuevo_nombre,60);
      $rutadelaimagen=$nuevo_nombre;
      if ($image1->save($path1.$nuevo_nombre,60)){
        $titulo=$request->titulo;
        $html=$request->html;
        $valores=Valores::Find($id);
        $valores->titulo=$titulo;
        $valores->html=$html;
        $valores->img=$rutadelaimagen;
        if($valores->save()){
          return response()->json([
            "mensaje" => "1"
          ]);
        }
      }else{
      }
    }
  }
  public function eliminar(Request $request){
    $infs=$request->infs;
    $valores=Valores::find($infs);
    if($valores->delete()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
}
