<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoCliente;

class TipoClienteController extends Controller
{



    public function __construct()
{
    $this->middleware(['role:admin']);
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return DB::table('tipo_cliente')->get();
        //return TipoCliente::all();
 

            if($request->ajax()){
                return TipoCliente::all();
            }else{
                $tipoCli = TipoCliente::paginate();
                return view('TipoCliente.index', compact('tipoCli'));
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
        $tc=new TipoCliente();
        $tc->nombre=$request->nombre;
        $tc->descuento=$request->descuento;
        $tc->save();
        return $tc;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tc=TipoCliente::find($id);
        $tc->nombre=$request->nombre;
        $tc->descuento=$request->descuento;
        $tc->save();
        return $tc;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tc=TipoCliente::find($id);
        ;
        $tc->delete();
       // return $tc;
    }
}
