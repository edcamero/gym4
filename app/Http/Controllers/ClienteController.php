<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $empleados = Cliente::all();
        
        if($request->ajax()){
            foreach ($empleados as $em){
                $em->persona;
                $em->tipoEmpleado;
            }
            return $empleados;
        }else{
            $tipoCli = Cliente::paginate();
            return view('Empleado.index', compact('tipoCli'));
        }
    }

    public function horarios(Request $request){
        if($request->ajax()){
            
            return Cliente::all();
        }else{
            $tipoCli = Cliente::paginate();
            return view('Empleado.horario', compact('tipoCli'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Empleado.agregar');
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
        $persona->tipo_doc  = $request->tipo_doc;
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

        $empleado             = new Cliente();
        $empleado->tip_emp_id = $request->tip_emp_id;
        $empleado->per_id     = $persona->id;
        $empleado->save();

        return $empleado;
        
    }
    


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        if($request->ajax()){

            $empleado = Cliente::find($id);

            $empleado->persona;
            $empleado->tipoEmpleado;
            $empleado->persona->user;
            $empleado->persona->tipoDocumento;

            return $empleado;
            
        }else{

            return view('Empleado.show');

        }
    }


    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if($request->ajax()){
            $empleado = Cliente::find($id);
            $empleado->persona;
            $empleado->tipoEmpleado;
            $empleado->persona->user;
            $empleado->persona->tipoDocumento;
            return $empleado;
            
        }else{
            return view('Empleado.cargar');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $persona             = Persona::find($request->per_id);

        $persona->tipo_doc  = $request->tipo_doc;
        $persona->documento = $request->documento;
        $persona->nombre    = $request->nombre;
        $persona->apellido  = $request->apellido;
        $persona->fecha_nac = $request->fecha_nac; 
        
        //$persona->sexo          = $request->sexo; 
        $persona->telefono  = $request->telefono;
        $persona->direccion = $request->direccion;
        $persona->altura    = (int)$request->altura;
        $persona->save();
/*
        $empleado = Empleado::find($request->emp_id);
        $empleado->tip_emp_id = $request->tip_emp_id;
        $empleado->save();
*/   
        
        return $persona;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e = Cliente::find($id);
        $e->delete();
        return $e;
    }

    
}