<?php

namespace App\Http\Controllers;

use App\Models\TipoEmpleado;
use Illuminate\Http\Request;

class TipoEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return TipoEmpleado::all();
        }else{
            $tipoEmpl = TipoEmpleado::paginate();
            return view('TipoEmpleado.index', compact('tipoEmpl'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoEmpleado  $tipoEmpleado
     * @return \Illuminate\Http\Response
     */
    public function show(TipoEmpleado $tipoEmpleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoEmpleado  $tipoEmpleado
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoEmpleado $tipoEmpleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoEmpleado  $tipoEmpleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoEmpleado $tipoEmpleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoEmpleado  $tipoEmpleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoEmpleado $tipoEmpleado)
    {
        //
    }
}
