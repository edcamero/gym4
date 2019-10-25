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
        $empleado=new Empleado();
        $empleado->documento=$data['documento'];
        $empleado->nombre=$data['firstname'];
        $empleado->apellido=$data['lastname'];
        $empleado->fecha_nac="2009-10-01";
        $empleado->sexo=$data['sexo'];
        $empleado->telefono=$data['telefono'];
        $empleado->direccion=$data['direccion'];
        $empleado->altura=$data['altura'];
        $empleado->foto="fotos";
        $empleado->user_id=$user->id;
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
