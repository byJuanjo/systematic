<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Yajra\Datatables\Facades\Datatables;
use App\Cursos;
use App\Categorias;
use App\Tipos;
use App\User;
use App\Horarios;
use App\Modulos;
use App\Ofertas;
use App\Ventas;
use App\Pagos;
use App\ModulosVentas;

class VentasController extends Controller{
  public function __construct(){
    $this->middleware('auth', ['except' => []]);
  }
  public function index(){
    $carbon = new \Carbon\Carbon();
    $date = $carbon->now();
    $inicio=$date->format('Y-m-d');

    $categorias=Categorias::all();
    $cursos=Cursos::all();
    $tipos=Tipos::all();
    $userId=Auth::user()->id;
    return view('ventas.index')
    ->with('categorias',$categorias)
    ->with('cursos',$cursos)
    ->with('tipos',$tipos)
    ->with('inicio',$inicio);
  }
  public function buscarUsuario($dni){
    $user=User::BuscarDni($dni)->get();
    if(count($user)==0){
      return response()->json([
        "mensaje" => 0
      ]);
    }else{
      return view('ventas.tabs.userData')
      ->with('user',$user);
    }
  }
  public function validarEmail(Request $request){
    $user_id=$request->user_id;
    $email=$request->email;
    $buscarEmail=User::BuscarEmail($user_id,$email)->get();
    if(count($buscarEmail)>0){
      return response()->json([
        "mensaje" => 1
      ]);
    }else{
      return response()->json([
        "mensaje" => 0
      ]);
    }
  }
  public function validarNewEmail(Request $request){
    $email=$request->email;
    $buscarEmail=User::BuscarNewEmail($email)->get();
    if(count($buscarEmail)>0){
      return response()->json([
        "mensaje" => 1
      ]);
    }else{
      return response()->json([
        "mensaje" => 0
      ]);
    }
  }
  public function actualizarUser(Request $request){
    $user_id=$request->user_id;
    $name=$request->name;
    $apellido=$request->apellido;
    $email=$request->email;
    $celular=$request->celular;
    $user=User::find($user_id);
    $user->name=$name;
    $user->apellido=$apellido;
    $user->email=$email;
    $user->celular=$celular;
    if($user->save()){
      return response()->json([
        "mensaje" => 1
      ]);
    }
  }
  public function crearUser(Request $request){
    $usuario=new User();
    $usuario->documento=$request->new_documento;
    $usuario->name=$request->new_name;
    $usuario->apellido=$request->new_apellido;
    $usuario->email=$request->new_email;
    $usuario->celular=$request->new_celular;
    $usuario->razon_social=$request->new_name.' '.$request->new_apellido;
    $usuario->password=bcrypt($request->new_documento);
    $usuario->active=1;
    $usuario->remember_token=str_random(100);
    if($usuario->save()){
      return response()->json([
        "mensaje" => 1
      ]);
    }
  }
  public function buscarHorario($curso_id){
    $carbon = new \Carbon\Carbon();
    $date = $carbon->now();
    $inicio=$date->format('Y-m-d');
    $horarios=Horarios::HorariosCurso($curso_id,$inicio)->get();
    return view('ventas.auxiliar.horarios')
    ->with('horarios',$horarios);
  }
  public function buscarModulos($curso_id){
    $modulos=Modulos::BuscarModulo($curso_id)->get();
    return view('ventas.auxiliar.modulos')
    ->with('modulos',$modulos);
  }
  public function buscarOfertas($curso_id){
    $ofertas=Ofertas::BuscarOfertas($curso_id)->get();
    return view('ventas.auxiliar.ofertas')
    ->with('ofertas',$ofertas);
  }
  public function traeOferta($oferta_id){
    $oferta=Ofertas::BuscarOfertasId($oferta_id)->get();
    return view('ventas.auxiliar.getOferta')
    ->with('ofertas',$oferta);
  }
  public function traePrecioOferta($oferta_id){
    $oferta=Ofertas::BuscarOfertasId($oferta_id)->get();

  }
  public function traePrecioModulo($oferta_id){
    $modulo=Modulos::BuscarModuloId($oferta_id)->get();
    return response()->json([
      "mensaje" => $modulo[0]->precio
    ]);
  }
  public function crearVenta(Request $request){
    $modulos_id=$request->modulos_id;
    $ofertas_id=$request->ofertas_id;
    $ventas=new Ventas();
    $ventas->user_id=$request->user_id;
    $ventas->vendedor_id=$request->vendedor_id;
    $ventas->cursos_id=$request->cursos_id;
    $ventas->precio=$request->precio;
    $ventas->tipoventa='INDIVIDUAL';
    if($ventas->save()){
      if($modulos_id!=''){
        $moduloVenta=new ModulosVentas();
        $moduloVenta->modulos_id=$modulos_id;
        $moduloVenta->ventas_id=$ventas->id;
        $moduloVenta->horarios_id=0;

        if($moduloVenta->save()){
          $pago=new Pagos();
          $pago->ventas_id=$ventas->id;
          $pago->pago=$request->acuenta;
          $pago->saldo=$request->saldo;
          if($pago->save()){
            return response()->json([
              "mensaje" => $ventas->id
            ]);
          }
        }
      }else if($ofertas_id!=''){
        $oferta=Ofertas::BuscarOfertasId($ofertas_id)->get();
        foreach ($oferta[0]->modulos as $modulos) {
          $moduloVenta=new ModulosVentas();
          $moduloVenta->modulos_id=$modulos->id;
          $moduloVenta->ventas_id=$ventas->id;
          $moduloVenta->horarios_id=0;
          $moduloVenta->save();
        }
        $pago=new Pagos();
        $pago->ventas_id=$ventas->id;
        $pago->pago=$request->acuenta;
        $pago->saldo=$request->saldo;
        $pago->fecha=$request->fecha;
        $pago->tipo_doc=$request->tipo_doc;
        $pago->num_documento=$request->num_documento;
        if($pago->save()){
          return response()->json([
            "mensaje" => $ventas->id
          ]);
        }
      }else{
        if($pago->save()){
          return response()->json([
            "mensaje" => 2
          ]);
        }
      }
    }
  }
  public function pagination_miHistorial(Request $request){
    $userId=Auth::user()->id;
    $ventas = Ventas::with('user','cursos')->where('vendedor_id',$userId)->orderby('id','desc');
    if($request->ajax()){
      return Datatables::eloquent($ventas)->make(true);
    }
  }
  public function miHistorial(){
    return view('ventas.tabs.miHistorial');
  }
  public function buscarHistoryVenta($venta_id){
    $carbon = new \Carbon\Carbon();
    $date = $carbon->now();
    $inicio=$date->format('Y-m-d');
    $venta=Ventas::find($venta_id);
    $curso_id=$venta->cursos_id;
    $horario=Horarios::HorariosCurso($curso_id,$inicio)->get();
    if($venta->tipoVenta=='INDIVIDUAL'){
      return view('ventas.auxiliar.historialVentaInd')
      ->with('horarios',$horario)
      ->with('venta',$venta);
    }else if($venta->tipoVenta=='CORPORATIVA'){
      return view('ventas.auxiliar.historialVentaCor')
      ->with('horarios',$horario)
      ->with('venta',$venta);
    }
  }
  public function realizarPago($venta_historial_id){
    $carbon = new \Carbon\Carbon();
    $date = $carbon->now();
    $inicio=$date->format('Y-m-d');

    $pago=Pagos::UltimoPago($venta_historial_id)->get();
    return view('ventas.auxiliar.realizarPago')
    ->with('pago',$pago)
    ->with('inicio',$inicio)
    ->with('venta_id',$venta_historial_id);
  }
  public function asignarHorario($venta_id){
    $carbon = new \Carbon\Carbon();
    $date = $carbon->now();
    $inicio=$date->format('Y-m-d');
    $venta=Ventas::find($venta_id);
    $curso_id=$venta->cursos_id;
    $horario=Horarios::HorariosCurso($curso_id,$inicio)->get();
    if($venta->tipoVenta=='INDIVIDUAL'){
      //return view('ventas.auxiliar.historialVentaInd')
      return view('ventas.auxiliar.asignarHorario')
      ->with('horarios',$horario)
      ->with('venta',$venta);
    }else if($venta->tipoVenta=='CORPORATIVA'){
      return view('ventas.auxiliar.historialVentaCor')
      ->with('horarios',$horario)
      ->with('venta',$venta);
    }
  }
  public function colocarHorario(Request $request){
    $modulosVentas_id=$request->modulosVentas_id;
    $horario_venta=$request->horario_venta;
    $moduloVenta=ModulosVentas::find($modulosVentas_id);
    $moduloVenta->horarios_id=$horario_venta;
    if($moduloVenta->save()){
      return response()->json([
        "mensaje" => 1
      ]);
    }
  }
  public function pagarSaldo(Request $request){
    
  }
}
