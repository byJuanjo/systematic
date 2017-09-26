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
use App\Certiport;

class CertiportController extends Controller{
  public function __construct(){
    $this->middleware('auth',['except' => ['index']]);
  }
  public function index(){
    $categorias=Categorias::all();
    $cursos=Cursos::all();
    $certiports=Certiport::all();
    return view('pagina.certiport')
    ->with('categorias',$categorias)
    ->with('cursos',$cursos)
    ->with('certiports',$certiports);
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
      $path1 = 'img/certiports/';
      $image1->encode('jpg',75);
      $image1->save($path1.$nuevo_nombre,60);
      $rutadelaimagen=$nuevo_nombre;
      if ($image1->save($path1.$nuevo_nombre,60)){
        $titulo=$request->titulo_add;
        $html=$request->html_add;
        $valor=new Certiport();
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
    $certiports=Certiport::all();
    return view('pagina.certiport.descripcion')
    ->with('certiports',$certiports);
  }
  public function show($id){
    $certiports=Certiport::Find($id);
    return view('pagina.certiport.edit')
    ->with('valor',$certiports);
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
      $path1 = 'img/certiports/';
      $image1->encode('jpg',75);
      $image1->save($path1.$nuevo_nombre,60);
      $rutadelaimagen=$nuevo_nombre;
      if ($image1->save($path1.$nuevo_nombre,60)){
        $titulo=$request->titulo;
        $html=$request->html;
        $certiports=Certiport::Find($id);
        $certiports->titulo=$titulo;
        $certiports->html=$html;
        $certiports->img=$rutadelaimagen;
        if($certiports->save()){
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
    $certiports=Certiport::find($infs);
    if($certiports->delete()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
}
