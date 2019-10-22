<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    public function buscar($id){
        $p=Persona::where('documento',$id)->get();
        return $p;
    }

    
}
