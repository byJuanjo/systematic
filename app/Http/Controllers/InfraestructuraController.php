<?php

namespace App\Http\Controllers;
USE Auth;
use Storage;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Infraestructura;
use App\Imagenes;
use App\ImagenesInfraestructura;
use App\Categorias;
use App\Cursos;

class InfraestructuraController extends Controller{
  public function __construct(){
    $this->middleware('auth',['except' => ['index']]);
  }
  public function index(){
    $categorias=Categorias::all();
    $cursos=Cursos::all();
    $infraestructuras=Infraestructura::Todos()->get();
    return view('pagina.infraestructura')
    ->with('infraestructuras',$infraestructuras)
    ->with('categorias',$categorias)
    ->with('cursos',$cursos);
  }
  public function show($id){
    $infraestructura=Infraestructura::Find($id);
    return view('pagina.infraestructura.edit')
    ->with('infraestructura',$infraestructura);
  }
  public function update(Request $request, $id){
    $infraestructura=Infraestructura::Find($id);
    $infraestructura->fill($request->all());
    if($infraestructura->save()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
  public function store(Request $request){
    $titulo=$request->titulo_add;
    $html=$request->html_add;
    $infraestructura=new Infraestructura();
    $infraestructura->titulo=$titulo;
    $infraestructura->html=$html;
    if($infraestructura->save()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
  public function descripcion(){
    $infraestructuras=Infraestructura::Todos()->get();
    return view('pagina.infraestructura.descripcion')
    ->with('infraestructuras',$infraestructuras);
  }
  public function subirImgInf(Request $request){
    $id=$request->id_img;
    $carbon = new \Carbon\Carbon();
    $date = $carbon->now();
    $formato=$date->format('dmYHis');
    $archivo = $request->file('imagen');
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
      $file1 = Input::file('imagen');
      $image1 = \Image::make(Input::file('imagen'));
      $path1 = 'img/infraestructura/';
      $image1->encode('jpg',75);
      $image1->save($path1.$nuevo_nombre,60);
      $rutadelaimagen=$nuevo_nombre;
      if ($image1->save($path1.$nuevo_nombre,60)){
        $imagenes=new Imagenes();
        $imagenes->ruta=$rutadelaimagen;
        if($imagenes->save()){
          $imagenes->infraestructura()->attach($id);
          return response()->json([
            "mensaje" => "1"
          ]);
        }
      }else{
      }
    }
  }
  public function quitarImagen(Request $request){
    $imagen_id=$request->imagen_id;
    $infs=$request->infs;
    $imagenes=Imagenes::find($imagen_id);
    $imagenes->infraestructura()->detach();
    if($imagenes->delete()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
  public function eliminar(Request $request){
    $infs=$request->infs;
    $infraestructuras=Infraestructura::find($infs);
    $infraestructuras->imagenes()->detach();
    if($infraestructuras->delete()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
}
