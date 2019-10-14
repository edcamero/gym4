<?php

use Illuminate\Database\Seeder;
use App\Models\TipoEmpleado;

class TipoEmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $te=new TipoEmpleado();
        $te->nombre='instructor';
        $te->save();
        $te=new TipoEmpleado();
        $te->nombre='vigilante';
        $te->save();

    }
}
