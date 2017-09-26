<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Mail;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Categorias;
use App\Cursos;

class AuthController extends Controller
{


    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
    }

    public function getLogin(){
      $categorias=Categorias::all();
      $cursos=Cursos::all();
      return view('auth.login')
      ->with('categorias',$categorias)
      ->with('cursos',$cursos);
    }

    public function postRegister(Request $request){
      $rules = [
        'tipo' => 'required',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|min:6|max:20|confirmed',
      ];
      $messages=[
        'tipo.required' => 'El tipo usuario es obligatorio',
        'email.required' => 'El correo no puede estar en blanco',
        'email.email' => 'El formato del correo es incorrecto',
        'email.max' => 'El maximo de caracteres permitidos es 255',
        'email.unique' => 'El correo ya existe',
        'password.required' => 'El campo contraseña es obligatorio',
        'password.min' => 'El minimo son 6 caracteres',
        'password.max' => 'El maximo son 20 caracteres',
        'password.confirmed' => 'Las contraseñas no coinciden '
      ];
      $validator = Validator::make($request->all(),$rules,$messages);

      if($validator->fails()){
        return redirect("/login")
        ->withErrors($validator)
        ->withInput();
      }else{
        $user=new User();
        $user->tipo=$request->tipo;
        $data['email']  = $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->remember_token=str_random(100);
        $data['confirm_token']  = $user->confirm_token=str_random(100);
        $user->save();

        Mail::send('mails.register',['data' => $data],function($mail) use($data){
          $mail->subject('Confirma tu cuenta');
          $mail->to($data['email']);

        });
        return redirect("/login")
        ->with("message","Hemos enviado un enlace de confirmacion a su cuenta de correo electornico, por favor revisa tu bandeja de entrada.");

      }
    }
    public function confirmRegister($email,$confirm_token){
      $user=new User;
      $the_user = $user->select()->where('email',$email)->where('confirm_token',$confirm_token);
      if(count($the_user)>0){
        $active=1;
        $confirm_token=str_random(100);
        $user->where('email',$email)->update(['active'=>$active,'confirm_token'=>$confirm_token]);
        return redirect('/login')
        ->with('message','Ya puedes iniciar sesión dentro de Systematic Shop');
      }else{
        return redirect('/');
      }
    }
    public function postLogin(Request $request){

         if (Auth::attempt(
                 [
                     'email' => $request->email,
                     'password' => $request->password,
                     'active' => 1
                 ]
                 , $request->has('remember')
                 )){
             return redirect()->intended($this->redirectPath());
         }
         else{
             $rules = [
                 'email' => 'required|email',
                 'password' => 'required',
             ];

             $messages = [
                 'email.required' => 'El campo email es requerido',
                 'email.email' => 'El formato de email es incorrecto',
                 'password.required' => 'El campo password es requerido',
             ];

             $validator = Validator::make($request->all(), $rules, $messages);

             return redirect('auth/login')
             ->withErrors($validator)
             ->withInput()
             ->with('message1', 'Error al iniciar sesión aun no has validado tu correo');
         }
     }

  /*  protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
  /*  protected function create(array $data)
    {
        return User::create([
            'tipo' => $data['tipo'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }  */
}
