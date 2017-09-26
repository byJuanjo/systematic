<?php
namespace App\Http\Controllers;
use Auth;
use File;
Use Excel;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Input;
use App\Nosotros;
use App\ImagenesNosotros;
use App\Categorias;
use App\Cursos;
use App\Tipos;
use App\Banner;
use Storage;
use App\Suscripciones;

class HomeController extends Controller{
  public function __construct(){
    $this->middleware('auth', ['except' => ['index','excel','nosotros','infraestructura','certiport','valor','contacto','suscribirse']]);
  }
  public function index(){
    $tipos=Tipos::all();
    $categorias=Categorias::all();
    $cursos=Cursos::Listos()->get();
    $banner=Banner::first();
    return view('welcome')
    ->with('tipos',$tipos)
    ->with('categorias',$categorias)
    ->with('cursos',$cursos)
    ->with('banner',$banner);
  }
  public function login(){
    $categorias=Categorias::all();
    $cursos=Cursos::all();
    return view('login')
    ->with('categorias',$categorias)
    ->with('cursos',$cursos);
  }
  public function excel(){
    $categorias=Categorias::all();
    $cursos=Cursos::all();
    return view('excel')
    ->with('categorias',$categorias)
    ->with('cursos',$cursos);
  }
  public function nosotros(){
    $nosotros=Nosotros::first();
    $imagenesNosotros=ImagenesNosotros::all();
    $categorias=Categorias::all();
    $cursos=Cursos::all();
    return view('pagina.nosotros')
    ->with('nosotros',$nosotros)
    ->with('imagenesNosotros',$imagenesNosotros)
    ->with('categorias',$categorias)
    ->with('cursos',$cursos);
  }

  public function infraestructura(){
    return view('pagina.infraestructura');
  }
  public function certiport(){
    return view('pagina.certiport');
  }
  public function elearning(){
    $categorias=Categorias::all();
    $cursos=Cursos::all();
    return view('pagina.elearning')
    ->with('categorias',$categorias)
    ->with('cursos',$cursos);
  }
  public function valor(){
    return view('pagina.valor');
  }
  public function contacto(){
    $categorias=Categorias::all();
    $cursos=Cursos::all();
    return view('pagina.contacto')
    ->with('categorias',$categorias)
    ->with('cursos',$cursos);
  }
  public function banner(){
    $banner=Banner::first();
    return view('pagina.banner')
    ->with('banner',$banner);
  }
  public function actualizarBanner(Request $request){
    $banner_id=$request->id;
    $banner=Banner::find($banner_id);
    $banner->textoa1=$request->textoa1;
    $banner->textoa2=$request->textoa2;
    $banner->textoa3=$request->textoa3;
    $banner->textoboton=$request->textoboton;
    $banner->textob1=$request->textob1;
    $banner->textob2=$request->textob2;
    $banner->textob3=$request->textob3;
    $banner->tipo=$request->tipo;
    if($request->imagen1){
      $archivo1 = $request->file('imagen1');
      $nombre_original=$archivo1->getClientOriginalName();
      $extension=$archivo1->getClientOriginalExtension();
      $nuevo_nombre=$nombre_original.".jpg";
      $file1 = Input::file('imagen');
      $image1 = \Image::make(Input::file('imagen1'));
      $path1 = 'img/slides/';
      $image1->encode('jpg',75);
      $image1->save($path1.$nuevo_nombre,60);

      $banner->imagen1=$nuevo_nombre;
    }
    if($request->imagen2){
      $archivo2 = $request->file('imagen2');
      $nombre_original=$archivo2->getClientOriginalName();
      $extension=$archivo2->getClientOriginalExtension();
      $nuevo_nombre=$nombre_original.".jpg";
      $file2 = Input::file('imagen');
      $image2 = \Image::make(Input::file('imagen2'));
      $path2 = 'img/slides/';
      $image2->encode('jpg',75);
      $image2->save($path2.$nuevo_nombre,60);
      $banner->imagen2=$nuevo_nombre;
    }
    if($request->video){

    }
    if($banner->save()){
      return response()->json([
        "mensaje" => 1
      ]);
    }
  }
  public function suscribirse(Request $request){
    $email=$request->email;
    $validSuscriptcion=Suscripciones::BuscarSuscripcion($email)->first();
    if(count($validSuscriptcion)>0){
      if($validSuscriptcion->activo=='0'){
        $suscripcion=Suscripciones::find($validSuscriptcion->id);
        $suscripcion->activo='1';
        if($suscripcion->save()){
          return response()->json([
            "mensaje" => 3
          ]);
        }
      }else{
        return response()->json([
          "mensaje" => 2
        ]);
      }
    }else{
      $carbon = new \Carbon\Carbon();
      $date = $carbon->now();
      $formato=$date->format('Y-m-d');
      $suscripcions=new Suscripciones();
      $suscripcions->fecha=$formato;
      $suscripcions->fill($request->all());
      if($suscripcions->save()){
        return response()->json([
          "mensaje" => 1
        ]);
      }
    }
  }
  public function pagination_suscritos(Request $request){
    $suscritos = Suscripciones::with('cursos')->orderby('id','desc');
    if($request->ajax()){
      return Datatables::eloquent($suscritos)->make(true);
    }
  }
  public function exportarSuscritos(){
    $suscritos=Suscripciones::Todos()->get();
    Excel::create('BASE DE DATOS DE SUSCRITOS EN BASE DE DATOS', function($excel) use($suscritos){
      $excel->sheet('LISTADO DE CONTRATOS', function($sheet) use($suscritos){
        $sheet->setBorder('A1:h1', 'thin');
        $sheet->cells('A1:h1',function($cells){
          $cells->setAlignment('center');
          $cells->setValignment('center');
          $cells->setFontWeight('bold');
        });
        $data=[];
        array_push($data,array(
          'NOMBRES','CORREO','CELULAR','ACTIVO','CURSO INTERES','FECHA','TELEMARKETING','OBSERVACIONES'
        ));
        foreach ($suscritos as $suscrito){
          array_push($data,array(
            $suscrito->nombre,
            $suscrito->email,
            $suscrito->celular,
            $suscrito->activo,
            $suscrito->cursos->titulo,
            $suscrito->fecha,
            $suscrito->telemarketing,
            $suscrito->observaciones,
          ));
        }
        $sheet->fromArray($data,null,'A1',false,false);
      });
    })->download('xls');
  }
  public function suscripcionContent($id){
    $suscripcion=Suscripciones::find($id);
    return view('perfil.dataSuscripcion')
    ->with('suscripcion',$suscripcion);
  }
  public function updateSuscripcion(Request $request){
    $id=$request->suscripcion_id;
    $suscripcion=Suscripciones::find($id);
    $suscripcion->telemarketing=$request->telemarketing;
    $suscripcion->observaciones=$request->observaciones;
    if($suscripcion->save()){
      return response()->json([
        "mensaje" => 1
      ]);
    }
  }
  public function updateTelemarketing(Request $request){
    $id=$request->suscripcion_id;
    $suscripcion=Suscripciones::find($id);
    $suscripcion->telemarketing='SI';
    if($suscripcion->save()){
      return response()->json([
        "mensaje" => 1
      ]);
    }
  }
}
