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
    public function index()
    {
        return view('Empleado.index');
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
        $user=new User();
        $user->nickname=$data['nickname'];
        $user->email=$data['email'];
        $user->password=Hash::make($data['password']);
        $user->save();
        
        $persona=new Persona();
        $persona->tip_doc=$data['tipo_doc'];
        $persona->documento=$data['documento'];
        $persona->nombre=$data['nombre'];
        $persona->apellido=$data['apellido'];
        $persona->fecha_nac=$data['fecha_nac'];
        $persona->sexo=$data['sexo'];
        $persona->telefono=$data['telefono'];
        $persona->direccion=$data['direccion'];
        $persona->altura=$data['altura'];
        $persona->foto="fotos";
        $persona->user_id=$user->id;
        $persona->save();

        $empleado=new Empleado();
        $empleado->tip_emp_id=$data['tip_emp_id'];
        $empleado->per_id=$persona->id;
        $empleado->save();


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
