<?php

use Illuminate\Database\Seeder;
use App\Models\TipoCliente;

class tipo_cliente_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        $tc=new TipoCliente();
        $tc->nombre='Exporadico';
        $tc->descuento=0;
        $tc->save();
        $tc=new TipoCliente();
        $tc->nombre='Habitual';
        $tc->descuento=10;
        $tc->save();
        
    }
}
