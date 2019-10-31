<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return Empleado::all();
        }else{
            $tipoCli = Empleado::paginate();
            return view('Empleado.index', compact('tipoCli'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user               = new User();
        $user->nickname     = $request->nickname;
        $user->email        = $request->email;
        $user->password = password_hash($request->password, PASSWORD_BCRYPT);
        $user->save();
        
        $persona            = new Persona();
        $persona->tipo_doc   = $request->tipo_doc;
        $persona->documento = $request->documento;
        $persona->nombre    = $request->nombre;
        $persona->apellido  = $request->apellido;
        $persona->fecha_nac = $request->fecha_nac;
        $persona->sexo      = "hombre";
        $persona->telefono  = $request->telefono;
        $persona->direccion = $request->direccion;
        $persona->altura    = (int)$request->altura;
        $persona->foto      = "fotos";
        $persona->user_id   = $user->id;
        $persona->save();

        $empleado             = new Empleado();
        $empleado->tip_emp_id = $request->tip_emp_id;
        $empleado->per_id     = $persona->id;
        $empleado->save();


        return $empleado;
        

        /*
        $user           = new User();
        $user->nickname = $data['nickname'];
        $user->email    = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
        
        $persona            = new Persona();
        $persona->tip_doc   = $data['tipo_doc'];
        $persona->documento = $data['documento'];
        $persona->nombre    = $data['nombre'];
        $persona->apellido  = $data['apellido'];
        $persona->fecha_nac = $data['fecha_nac'];
        $persona->sexo      = "hombre";
        $persona->telefono  = $data['telefono'];
        $persona->direccion = $data['direccion'];
        $persona->altura    = $data['altura'];
        $persona->foto      = "fotos";
        $persona->user_id   = $user->id;
        $persona->save();

        $empleado             = new Empleado();
        $empleado->tip_emp_id = $data['tip_emp_id'];
        $empleado->per_id     = $persona->id;
        $empleado->save();
        */
        
    }
    


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
