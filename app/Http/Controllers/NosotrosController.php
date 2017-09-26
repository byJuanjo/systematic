<?php

namespace App\Http\Controllers;
USE Auth;
use Storage;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Imagenes;
use App\Nosotros;
use App\ImagenesNosotros;
class NosotrosController extends Controller{
  public function __construct(){
    $this->middleware('auth');
  }
  public function subirImgNos(Request $request){
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

      $nuevo_thumb=$formato.".jpg";
      $file = Input::file('imagen');
      $image = \Image::make(Input::file('imagen'));
      $path = 'img/nosotros/thumb/';
      $image->encode('jpg',75);
      $image->resize(75,75);
      $image->save($path.$nuevo_thumb,60);

      $nuevo_nombre=$formato.".jpg";
      $file1 = Input::file('imagen');
      $image1 = \Image::make(Input::file('imagen'));
      $path1 = 'img/nosotros/';
      $image1->encode('jpg',75);
      $image1->save($path1.$nuevo_nombre,60);
      $rutadelaimagen=$nuevo_nombre;

      if ($image1->save($path1.$nuevo_nombre,60)){
        $imagenes=new Imagenes();
        $imagenes->ruta=$rutadelaimagen;
        if($imagenes->save()){
          $imagenes->nosotros()->attach(1);
          return response()->json([
            "mensaje" => "1"
          ]);
        }
      }else{
      }
    }
  }
  public function llamarImgNos(){
    $imagenesNosotros=ImagenesNosotros::all();
    return view('pagina.nosotros.galeria')
    ->with('imagenesNosotros',$imagenesNosotros);
  }
  public function quitarImagenNos($imagen_id){
    $imagenes=Imagenes::find($imagen_id);
    $imagenes->nosotros()->detach();
    if($imagenes->delete()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }

  public function nosSeccion1(){
    $nosotros=Nosotros::first();
    return view('pagina.nosotros.seccion1')
    ->with('nosotros',$nosotros);
  }
  public function nosSeccion2(){
    return view('pagina.nosotros.seccion2');
  }
  public function nosSeccion3(){
    return view('pagina.nosotros.seccion3');
  }
  public function actualizarNos(Request $request){
    $nosotros=Nosotros::find(1);
    $nosotros->fill($request->all());
    if($nosotros->save()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
  public function descripcion(){
    $nosotros=Nosotros::first();
    $imagenesNosotros=ImagenesNosotros::all();
    return view('pagina.nosotros.descripcion')
    ->with('nosotros',$nosotros)
    ->with('imagenesNosotros',$imagenesNosotros);
  }
}
