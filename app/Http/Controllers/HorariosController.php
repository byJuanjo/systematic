<?php

namespace App\Http\Controllers;
USE Auth;
use Storage;
use Session;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Infraestructura;
use App\Imagenes;
use App\ImagenesInfraestructura;
use App\Categorias;
use App\Horarios;
use App\Laboratorios;
use App\Docentes;
use App\Cursos;
use App\Modulos;

class HorariosController extends Controller{
  public function index(){
    $categorias=Categorias::all();
    $laboratorios=Laboratorios::all();
    $docentes=Docentes::all();
    $cursos=Cursos::Listos()->get();
    $horarios=Horarios::Todos()->get();
    return view('horarios.index')
    ->with('categorias',$categorias)
    ->with('laboratorios',$laboratorios)
    ->with('docentes',$docentes)
    ->with('cursos',$cursos)
    ->with('horarios',$horarios);
  }
  //FUNCIONES PARA HORARIOS
  public function buscarModulo($curso_id){
    $modulos=Modulos::BuscarModulo($curso_id)->get();
    return view('horarios.horarios.modulos')
    ->with('modulos',$modulos);
  }
  public function addHorario(Request $request){
    $horario=new Horarios();
    $horario->laboratorios_id=$request->laboratorios_id;
    $horario->docentes_id=$request->docentes_id;
    $horario->hora_general=$request->hora_general;
    $horario->hora_generalf=$request->hora_generalf;
    $horario->vacantes=$request->vacantes;
    if($request->lunes){
      $horario->lunes=$request->lunes;
    }
    $horario->lunes_hora=$request->lunes_hora;
    $horario->lunes_horaf=$request->lunes_horaf;
    if($request->martes){
      $horario->martes=$request->martes;
    }
    $horario->martes_hora=$request->martes_hora;
    $horario->martes_horaf=$request->martes_horaf;
    if($request->miercoles){
      $horario->miercoles=$request->miercoles;
    }
    $horario->miercoles_hora=$request->miercoles_hora;
    $horario->miercoles_horaf=$request->miercoles_horaf;
    if($request->jueves){
      $horario->jueves=$request->jueves;
    }
    $horario->jueves_hora=$request->jueves_hora;
    $horario->jueves_horaf=$request->jueves_horaf;
    if($request->viernes){
      $horario->viernes=$request->viernes;
    }
    $horario->viernes_hora=$request->viernes_hora;
    $horario->viernes_horaf=$request->viernes_horaf;
    if($request->sabado){
      $horario->sabado=$request->sabado;
    }
    $horario->sabado_hora=$request->sabado_hora;
    $horario->sabado_horaf=$request->sabado_horaf;
    if($request->domingo){
      $horario->domingo=$request->domingo;
    }
    $horario->domingo_hora=$request->domingo_hora;
    $horario->domingo_horaf=$request->domingo_horaf;
    $horario->fecha_inicio=$request->fecha_inicio;
    $horario->fecha_fin=$request->fecha_fin;
    $horario->fecha_muestra=$request->fecha_muestra;
    $horario->fecha_finmuestra=$request->fecha_finmuestra;
    $horario->cursos_id=$request->cursos_id;
    $horario->modulos_id=$request->modulos_id;
    if($horario->save()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
  public function editHorario(Request $request){
    $horarios_id=$request->horario_id;
    $horario=Horarios::find($horarios_id);
    $horario->laboratorios_id=$request->laboratorios_id;
    $horario->docentes_id=$request->docentes_id;
    $horario->hora_general=$request->hora_general;
    $horario->hora_generalf=$request->hora_generalf;
    $horario->vacantes=$request->vacantes;
    if($request->lunes){
      $horario->lunes=$request->lunes;
    }
    $horario->lunes_hora=$request->lunes_hora;
    $horario->lunes_horaf=$request->lunes_horaf;
    if($request->martes){
      $horario->martes=$request->martes;
    }
    $horario->martes_hora=$request->martes_hora;
    $horario->martes_horaf=$request->martes_horaf;
    if($request->miercoles){
      $horario->miercoles=$request->miercoles;
    }
    $horario->miercoles_hora=$request->miercoles_hora;
    $horario->miercoles_horaf=$request->miercoles_horaf;
    if($request->jueves){
      $horario->jueves=$request->jueves;
    }
    $horario->jueves_hora=$request->jueves_hora;
    $horario->jueves_horaf=$request->jueves_horaf;
    if($request->viernes){
      $horario->viernes=$request->viernes;
    }
    $horario->viernes_hora=$request->viernes_hora;
    $horario->viernes_horaf=$request->viernes_horaf;
    if($request->sabado){
      $horario->sabado=$request->sabado;
    }
    $horario->sabado_hora=$request->sabado_hora;
    $horario->sabado_horaf=$request->sabado_horaf;
    if($request->domingo){
      $horario->domingo=$request->domingo;
    }
    $horario->domingo_hora=$request->domingo_hora;
    $horario->domingo_horaf=$request->domingo_horaf;
    $horario->fecha_inicio=$request->fecha_inicio;
    $horario->fecha_fin=$request->fecha_fin;
    $horario->fecha_muestra=$request->fecha_muestra;
    $horario->fecha_finmuestra=$request->fecha_finmuestra;
    $horario->cursos_id=$request->cursos_id;
    $horario->modulos_id=$request->modulos_id;
    if($horario->save()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
  public function showHor($id){
    $horarios=Horarios::find($id);
    $laboratorios=Laboratorios::all();
    $docentes=Docentes::all();
    $cursos=Cursos::Listos()->get();
    $cursos_id=$horarios->cursos_id;
    $modulos=Modulos::BuscarModulo($cursos_id)->get();
    return view('horarios.horarios.edit')
    ->with('laboratorios',$laboratorios)
    ->with('docentes',$docentes)
    ->with('cursos',$cursos)
    ->with('horario',$horarios)
    ->with('modulos',$modulos);
  }
  public function DupHor($id){
    $horarios=Horarios::find($id);
    $laboratorios=Laboratorios::all();
    $docentes=Docentes::all();
    $cursos=Cursos::Listos()->get();
    $cursos_id=$horarios->cursos_id;
    $modulos=Modulos::BuscarModulo($cursos_id)->get();
    return view('horarios.horarios.duplicado')
    ->with('laboratorios',$laboratorios)
    ->with('docentes',$docentes)
    ->with('cursos',$cursos)
    ->with('horario',$horarios)
    ->with('modulos',$modulos);
  }
  public function datos(){
    $horarios=Horarios::Todos()->get();
    return view('horarios.horarios.data')
    ->with('horarios',$horarios);
  }
  public function agregar(){
    $laboratorios=Laboratorios::all();
    $docentes=Docentes::all();
    $cursos=Cursos::Listos()->get();
    return view('horarios.horarios.agregar')
    ->with('laboratorios',$laboratorios)
    ->with('docentes',$docentes)
    ->with('cursos',$cursos);
  }
  //FUNCIONES PARA LABORATORIOS
  public function datalab(){
    $laboratorios=Laboratorios::all();
    return view('horarios.laboratorios.data')
    ->with('laboratorios',$laboratorios);
  }
  public function addLaboratorio(Request $request){
    $laboratorio=new Laboratorios();
    $laboratorio->titulo=$request->titulo;
    $laboratorio->descripcion=$request->descripcion;
    $laboratorio->ubicacion=$request->ubicacion;
    $laboratorio->capacidad=$request->capacidad;
    if($laboratorio->save()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
  public function showLab($id){
    $laboratorio=Laboratorios::find($id);
    return view('horarios.laboratorios.edit')
    ->with('laboratorio',$laboratorio);
  }
  public function editLaboratorio(Request $request){
    $id=$request->id;
    $laboratorio=Laboratorios::find($id);
    $laboratorio->titulo=$request->titulo;
    $laboratorio->descripcion=$request->descripcion;
    $laboratorio->ubicacion=$request->ubicacion;
    $laboratorio->capacidad=$request->capacidad;
    if($laboratorio->save()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
  //FUNCIONES PARA DOCENTES
  public function dataDoc(){
    $docentes=Docentes::all();
    return view('horarios.docentes.data')
    ->with('docentes',$docentes);
  }
  public function addDocente(Request $request){
    $docentes=new Docentes();
    $docentes->nombre=$request->nombre;
    $docentes->apellido=$request->apellido;
    if($docentes->save()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
  public function showDoc($id){
    $docente=Docentes::find($id);
    return view('horarios.docentes.edit')
    ->with('docente',$docente);
  }
  public function editDocente(Request $request){
    $id=$request->id;
    $docentes=Docentes::find($id);
    $docentes->nombre=$request->nombre;
    $docentes->apellido=$request->apellido;
    if($docentes->save()){
      return response()->json([
        "mensaje" => "1"
      ]);
    }
  }
  public function vacantes($laboratorio){
    $laboratorio=Laboratorios::find($laboratorio);
    return response()->json([
      "mensaje" => $laboratorio->capacidad
    ]);
  }
}
