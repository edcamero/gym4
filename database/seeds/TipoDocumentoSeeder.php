<?php

use Illuminate\Database\Seeder;
use App\Models\TipoDocumento;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $te=new TipoDocumento();
        $te->nombre='cedula de ciudadania';
        $te->save();
        $te=new TipoDocumento();
        $te->nombre='extrangero';
        $te->save();

    }
}