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
use App\Elearning;

class ElearningController extends Controller{
  public function __construct(){
    $this->middleware('auth',['except' => ['index']]);
  }
  public function index(){
    $categorias=Categorias::all();
    $cursos=Cursos::all();
    $elearnings=Elearning::all();
    return view('pagina.elearning')
    ->with('categorias',$categorias)
    ->with('cursos',$cursos)
    ->with('elearnings',$elearnings);
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
      $path1 = 'img/elearning/';
      $image1->encode('jpg',75);
      $image1->save($path1.$nuevo_nombre,60);
      $rutadelaimagen=$nuevo_nombre;
      if ($image1->save($path1.$nuevo_nombre,60)){
        $titulo=$request->titulo_add;
        $html=$request->html_add;
        $elearning=new Elearning();
        $elearning->titulo=$titulo;
        $elearning->html=$html;
        $elearning->img=$rutadelaimagen;
        if($elearning->save()){
          return response()->json([
            "mensaje" => "1"
          ]);
        }
      }else{
      }
    }
  }
  public function descripcion(){
    $elearnings=Elearning::all();
    return view('pagina.elearning.descripcion')
    ->with('elearnings',$elearnings);
  }
  public function show($id){
    $elearning=Elearning::Find($id);
    return view('pagina.elearning.edit')
    ->with('elearning',$elearning);
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
      $path1 = 'img/elearning/';
      $image1->encode('jpg',75);
      $image1->save($path1.$nuevo_nombre,60);
      $rutadelaimagen=$nuevo_nombre;
      if ($image1->save($path1.$nuevo_nombre,60)){
        $titulo=$request->titulo;
        $html=$request->html;
        $elearning=Elearning::Find($id);
        $elearning->titulo=$titulo;
        $elearning->html=$html;
        $elearning->img=$rutadelaimagen;
        if($elearning->save()){
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
    $elearning=Elearning::find($infs);
    if($elearning->delete()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
}
