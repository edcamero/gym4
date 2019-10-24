<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return TipoDocumento::all();
        }else{
            $tipoDocu = TipoDocumento::paginate();
            return view('TipoDocumento.index', compact('tipoDocu'));
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
        $td=new TipoDocumento();
        $td->nombre=$request->nombre;
        $td->save();
        return $td;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoEmpleado  $tipoEmpleado
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDocumento $TipoDocumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoEmpleado  $tipoEmpleado
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoDocumento $TipoDocumento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $td=TipoDocumento::find($id);
        $td->nombre=$request->nombre;
        $td->save();
        return $td;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoEmpleado  $tipoEmpleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $td=TipoDocumento::find($id);
        
        $td->delete();
        return $td;
    }
}
