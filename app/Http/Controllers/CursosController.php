<?php

namespace App\Http\Controllers;
use Auth;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Cursos;
use App\Categorias;
use App\Tipos;
use App\Imagenes;
use App\Modulos;
use App\Mdatos;
use App\Ofertas;
use Storage;
use App\Horarios;
use App\Comentarios;
use Mail;
use App\User;

class CursosController extends Controller{
  public function __construct(){
    $this->middleware('auth',['except' => ['show','modulo']]);
  }
  public function newCurso(){
    $curso=new Cursos();
    if($curso->save()){
      $id=$curso->id;
      return redirect("/curso.edit/".$id);
    }
  }
  public function promociones(){
    $tipos=Tipos::all();
    $categorias=Categorias::all();
    $cursos=Cursos::Listos()->get();
    return view('cursos.promociones')
    ->with('tipos',$tipos)
    ->with('categorias',$categorias)
    ->with('cursos',$cursos);
  }
  public function edit($id){
    $curso=Cursos::find($id);
    $categorias=Categorias::all();
    $cursos=Cursos::all();
    $tipos=Tipos::all();
    $modulos=Modulos::BuscarModulo($id)->get();
    $imagenes=Imagenes::BuscarImagenes($id)->get();
    $ofertas=Ofertas::BuscarOfertas($id)->get();

    return view('cursos.newCursos')
    ->with('categorias',$categorias)
    ->with('curso_id',$id)
    ->with('cursos',$cursos)
    ->with('curso',$curso)
    ->with('tipos',$tipos)
    ->with('imagenes',$imagenes)
    ->with('modulos',$modulos)
    ->with('ofertas',$ofertas);
  }
  public function crearCurso(Request $request){
    $curso=new Cursos();
    $curso->titulo=$request->titulo;
    if($curso->save()){
      return response()->json([
        "mensaje" => $curso->id
      ]);
    }else{
      return response()->json([
        "mensaje" => 'error'
      ]);
    }
  }
  public function editCampoCurso(Request $request){
    $curso_id=$request->curso_id;
    $curso=Cursos::find($curso_id);
    $curso->dirigido=$request->dirigido;
    $curso->descripcion=$request->descripcion;
    $curso->finalizado=$request->finalizado;
    $curso->fill($request->all());
    if($curso->save()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
  public function show($id){
    $carbon = new \Carbon\Carbon();
    $date = $carbon->now();
    $inicio=$date->format('Y-m-d');

    $curso=Cursos::find($id);
    $categorias=Categorias::all();
    $cursos=Cursos::all();
    $imagenes=$curso->imagenes;
    $modulos=Modulos::BuscarModulo($id)->get();
    $categoria=Categorias::find($curso->categorias_id);
    $tipo=Tipos::find($curso->tipos_id);
    $relacionados=Cursos::Relacionados($id,$curso->categorias_id)->get();
    $horarios=Horarios::HorariosCurso($id,$inicio)->get();
    $comentarios=Comentarios::ComentariosCurso($id)->get();
    $ofertas=Ofertas::BuscarOfertas($id)->get();
    return view('cursos.show')
    ->with('categorias',$categorias)
    ->with('cursos',$cursos)
    ->with('curso',$curso)
    ->with('curso_id',$id)
    ->with('imagenes',$imagenes)
    ->with('modulos',$modulos)
    ->with('categoria',$categoria)
    ->with('tipo',$tipo)
    ->with('relacionados',$relacionados)
    ->with('horarios',$horarios)
    ->with('ofertas',$ofertas)
    ->with('comentarios',$comentarios);
  }

  public function modalImagenes($id){
    $imagenes=Imagenes::BuscarImagenes($id)->get();
    return view('cursos.imagenes.subirImagenesMd')->with('imagenes',$imagenes)->with('curso_id',$id);
  }
  public function subirImagenCurso(Request $request){
    $id=$request->curso_id;
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
      $path1 = 'img/cursos/';
      $image1->encode('jpg',75);
      $image1->save($path1.$nuevo_nombre,60);
      $rutadelaimagen=$nuevo_nombre;
      if ($image1->save($path1.$nuevo_nombre,60)){
        $imagenes=new Imagenes();
        $imagenes->ruta=$rutadelaimagen;
        if($imagenes->save()){
          $imagenes->cursos()->attach($id);
          return response()->json([
            "mensaje" => "1"
          ]);
        }
      }else{
      }
    }
  }
  public function quitarImagenes($imagen_id,$curso_id){
    $imagenes=Imagenes::find($imagen_id);
    $imagenes->cursos()->detach();
    if($imagenes->delete()){
      $imagenes=Imagenes::BuscarImagenes($curso_id)->get();
      return view('cursos.imagenes.subirImagenesMd')->with('imagenes',$imagenes)->with('curso_id',$curso_id);
    }
  }
  //>>>>>>>>>>>>>>>>>>>>>>>>>>>FUNCIONES PARA SUBIR IMAGENES A LOS CURSOS
  //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
  //>>>>>>>>>>>>>>>>>>>>>>>>>>>FUNCIONES PARA CREAR MODULOS A LOS CURSOS
  public function modalModulo($curso_id){
    $modulos=Modulos::BuscarModulo($curso_id)->get();
    return view('cursos.modulos.crearModuloMd')->with('modulos',$modulos)->with('curso_id',$curso_id);
  }
  public function modalCurso($curso_id){
    $modulos=Modulos::BuscarModulo($curso_id)->get();
    return view('cursos.modulos.modulos')->with('modulos',$modulos)->with('curso_id',$curso_id);
  }
  public function crearModulo(Request $request){
    $id=$request->curso_id;
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
      $path1 = 'img/cursos/';
      $image1->encode('jpg',75);
      $image1->save($path1.$nuevo_nombre,60);
      $rutadelaimagen=$nuevo_nombre;
      if ($image1->save($path1.$nuevo_nombre,60)){
        $modulos=new Modulos();
        $modulos->titulo=$request->titulo;
        $modulos->precio=$request->precio;
        $modulos->ruta=$rutadelaimagen;
        if($modulos->save()){
          $modulos->cursos()->attach($id);
          return response()->json([
            "mensaje" => $modulos->id
          ]);
        }
      }else{
      }
    }
  }
  public function crearModuloCaracteristica(Request $request){
    $id=$request->modulo_id1;
    $Mdatos=new Mdatos();
    $Mdatos->titulo=$request->titulo;
    $Mdatos->descripcion=$request->descripcion;
    if($Mdatos->save()){
      $Mdatos->modulos()->attach($id);
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
  public function editModulo($modulo_id){
    $modulo=Modulos::find($modulo_id);
    $caracteristicas=Mdatos::BuscarCaracteristicas($modulo_id)->get();
    return view('cursos.modulos.edit')->with('modulo',$modulo)->with('caracteristicas',$caracteristicas);
  }
  public function updateModulo(Request $request){
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
      $path1 = 'img/cursos/';
      $image1->encode('jpg',75);
      $image1->save($path1.$nuevo_nombre,60);
      $rutadelaimagen=$nuevo_nombre;
      if ($image1->save($path1.$nuevo_nombre,60)){
        $modulo_id=$request->modulo_id;
        $modulo=Modulos::find($modulo_id);
        $modulo->titulo=$request->titulo;
        $modulo->precio=$request->precio;
        $modulo->ruta=$rutadelaimagen;
        if($modulo->save()){
          return response()->json([
            "mensaje" => "1"
          ]);
        }
      }
    }
  }
  public function listCaracteristicas($id){
    $caracteristicas=Mdatos::BuscarCaracteristicas($id)->get();
    return view('cursos.modulos.listEditCaracteristicas')->with('caracteristicas',$caracteristicas);
  }
  public function editarCaracteristicaModulo(Request $request){
    $caracteristica_id=$request->caracteristica_id;
    $caracteristica=Mdatos::find($caracteristica_id);
    $caracteristica->titulo=$request->titulo;
    $caracteristica->descripcion=$request->descripcion;
    if($caracteristica->save()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
  public function quitarCaracteristicas($caracteristica_id){
    $caracteristicas=Mdatos::find($caracteristica_id);
    $modulo=$caracteristicas->modulos[0]->id;
    $caracteristicas->modulos()->detach();
    if($caracteristicas->delete()){
      $caracteristicas=Mdatos::BuscarCaracteristicas($modulo)->get();
      return view('cursos.modulos.listEditCaracteristicas')->with('caracteristicas',$caracteristicas);
    }
  }
  //>>>>>>>>>>>>>>>>>>>>>>>>>>>FUNCIONES PARA CREAR MODULOS A LOS CURSOS
  //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
  //>>>>>>>>>>>>>>>>>>>>>>>>>>>FUNCIONES PARA CREAR SILABUS DE CURSOS
  public function modalSilabo($curso_id){
    return view('cursos.silabo.crearSilaboMd')->with('curso_id',$curso_id);
  }
  public function subirSilaboCurso(Request $request){
    $curso_id=$request->curso_id;
    //obtenemos el campo file definido en el formulario
    $receipt = $request->file('file');
    $fileName = $receipt->getClientOriginalName();
    $fileExtension = $receipt->getClientOriginalExtension();
    $name = str_slug($fileName) . str_slug(str_random(5)) . '.' . $fileExtension;
    $move = $receipt->move('material/',$name);
    $curso=Cursos::find($curso_id);
    $curso->silabo=$name;
    if($curso->save()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
  public function modulo($modulo_id){
    $carbon = new \Carbon\Carbon();
    $date = $carbon->now();
    $inicio=$date->format('Y-m-d');

    $modulo=Modulos::find($modulo_id);
    $categorias=Categorias::all();
    $cursos=Cursos::all();
    $horarios=Horarios::HorariosModulo($modulo_id,$inicio)->get();
    $relacionados=Modulos::Relacionados($modulo->cursos[0]->id,$modulo_id)->get();
    $mdatos=Mdatos::BuscarCaracteristicas($modulo_id)->get();

    return view('cursos.modulos.show')
    ->with('categorias',$categorias)
    ->with('cursos',$cursos)
    ->with('modulo',$modulo)
    ->with('relacionados',$relacionados)
    ->with('mdatos',$mdatos)
    ->with('horarios',$horarios);
  }

  public function enviarComentario(Request $request){
    $carbon = new \Carbon\Carbon();
    $date = $carbon->now();
    $hoy=$date->format('Y-m-d');
    $userId=Auth::user()->id;
    $cursos_id=$request->cursos_id;
    $descripcion=$request->descripcion_com;
    $comentario=New Comentarios();
    $comentario->descripcion=$descripcion;
    $comentario->fecha=$hoy;
    $comentario->users_id=$userId;
    if($comentario->save()){
      $comentario->cursos()->attach($cursos_id);
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
  public function listComentarios($curso_id){
    $comentarios=Comentarios::ComentariosCurso($curso_id)->get();
    return view('cursos.listComentarios')
    ->with('comentarios',$comentarios);
  }
  public function listPorResponder(){
    $comentarios=Comentarios::ComentariosPorResponder()->get();
    return view('perfil.consultasAdmin')
    ->with('comentarios',$comentarios);
  }
  public function reponderComentarios(Request $request){
    $carbon = new \Carbon\Carbon();
    $date = $carbon->now();
    $hoy=$date->format('Y-m-d');
    $userId=Auth::user()->id;
    $comentario_id=$request->comentario_id;
    $comentario=Comentarios::find($comentario_id);
    $cliente=$comentario->users_id;

    $usuario=User::find($cliente);
    $cliente_mail=$usuario->email;
    $name=$usuario->name;
    $comentario->respuesta=$request->respuesta;
    $comentario->fecha_r=$hoy;
    $comentario->respuesta_id=$userId;
    if($comentario->save()){
      return response()->json([
        "mensaje" => "1"
      ]);
      $data['name']=$name;
      $data['email']=$cliente_mail;
      $data['respuesta']=$comentario->respuesta;
      $data['descripcion']=$comentario->descripcion;
      Mail::send('mails.respuesta', ['data' => $data], function($mail) use($data){
        $mail->subject('Acanban de responder tu consulta');
        $mail->to($data['email'], $data['name']);
      });

    }
  }
  public function eliminarConsulta($comentario_id){
    $comentario=Comentarios::find($comentario_id);
    $comentario->cursos()->detach();
    if($comentario->delete()){
      $comentarios=Comentarios::ComentariosPorResponder()->get();
      return view('perfil.consultasAdmin')
      ->with('comentarios',$comentarios);
    }
  }
  public function ofertaForm($curso_id){
    $modulos=Modulos::BuscarModulo($curso_id)->get();
    return view('cursos.ofertas.newForm')
    ->with('modulos',$modulos)
    ->with('curso_id',$curso_id);
  }
  public function guardarOferta(Request $request){
    $oferta=new Ofertas();
    $oferta->cursos_id=$request->curso_id;
    $oferta->porcentaje=$request->porcentaje;
    if($oferta->save()){
      if($request->modulos_id1!=0){
        $oferta->modulos()->attach($request->modulos_id1);
      }
      if($request->modulos_id2!=0){
        $oferta->modulos()->attach($request->modulos_id2);
      }
      if($request->modulos_id3!=0){
        $oferta->modulos()->attach($request->modulos_id3);
      }
      return response()->json([
        "mensaje" => 1
      ]);
    }
  }
  public function ofertasEdit($curso_id){
    $modulos=Modulos::BuscarModulo($curso_id)->get();
    $ofertas=Ofertas::BuscarOfertas($curso_id)->get();
    return view('cursos.ofertas.ofertasEdit')
    ->with('ofertas',$ofertas)
    ->with('modulos',$modulos)
    ->with('curso_id',$curso_id);
  }
  public function editOfertas($ofertas_id){
    $oferta=Ofertas::find($ofertas_id);
    return view('cursos.ofertas.edit')
    ->with('oferta',$oferta);
  }
  public function updateOferta(Request $request){
    $oferta_id=$request->oferta_id;
    $oferta=Ofertas::find($oferta_id);
    $oferta->porcentaje=$request->porcentaje;
    $oferta->activo=$request->activo;
    if($oferta->save()){
      return response()->json([
        "mensaje" => 1
      ]);
    }
  }
  public function eliminarOferta(Request $request){
    $oferta_id=$request->oferta_id;
    $oferta=Ofertas::find($oferta_id);
    $oferta->modulos()->detach();
    if($oferta->delete()){
      return response()->json([
        "mensaje" => 1
      ]);
    }
  }
  public function ofertas($oferta_id){
    $carbon = new \Carbon\Carbon();
    $date = $carbon->now();
    $inicio=$date->format('Y-m-d');

    $oferta=Ofertas::BuscarOfertasId($oferta_id)->get();
    $otrasOfertas=Ofertas::OtrasOfertas($oferta_id)->get();
    $curso_id=$oferta[0]->cursos->id;
    $curso=Cursos::find($curso_id);
    $categoria=Categorias::find($curso->categorias_id);
    $tipo=Tipos::find($curso->tipos_id);
    $horarios=Horarios::HorariosCurso($curso_id,$inicio)->get();
    $comentarios=Comentarios::ComentariosCurso($curso_id)->get();
    $cursos=Cursos::all();
    $tipos=Tipos::all();
    $categorias=Categorias::all();

    return view('cursos.ofertas.show')
    ->with('curso',$curso)
    ->with('tipos',$tipos)
    ->with('categorias',$categorias)
    ->with('cursos',$cursos)
    ->with('oferta',$oferta)
    ->with('categoria',$categoria)
    ->with('tipo',$tipo)
    ->with('horarios',$horarios)
    ->with('comentarios',$comentarios)
    ->with('otrasOfertas',$otrasOfertas);
  }
}
