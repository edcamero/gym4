<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\prueba;
use App\Models\Persona;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nickname' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            //'altura'=>['requiere'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        /*prueba::create([
            'nickname' => $data['name'],
        ]);*/

       $prueba=new prueba();
       $prueba->nickname=$data['lastname'];
       $prueba->save();

        $user=new User();
        $user->nickname=$data['nickname'];
        $user->email=$data['email'];
        $user->password=$data['password'];
       
        $user->save();
        /*return User::create([
            'nickname' => $data['nickname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);*/

       $persona=new Persona();
       $persona->documento=$data['documento'];
       $persona->nombre=$data['firstname'];
       $persona->apellido=$data['lastname'];
       $persona->fecha_nac="2009-10-01";
       $persona->sexo=$data['sexo'];
       $persona->telefono=$data['telefono'];
       $persona->direccion=$data['direccion'];
       $persona->altura=$data['altura'];
       $persona->foto="fotos";
       $persona->user_id=$user->id;
       $persona->save();

       return $user;

        
    }
}
