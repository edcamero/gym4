<?php

namespace App\Http\Controllers;

use \Auth;


class PermissionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   function check() {
    $permissions = [];
    foreach (Auth::user()->getAllPermissions() as $permission) {
      $permissions[] = $permission->name;
    }

    return $permissions;
     //return Auth::user()->getAllPermissions();
     
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
                return config('app.modulos');
            }else{
                
                return 'hello permisos';
            }
    }

    public function getModulos()
    {
        //return DB::table('tipo_cliente')->get();
        //return TipoCliente::all();
  
                return config('app.modulos');
            
    }
    
}