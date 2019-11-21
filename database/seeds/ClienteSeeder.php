<?php

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $e             = new Cliente();
        $e->pers_id     = 1;
        $e->tipo_cliente_id = 1;
        $e->save();
    }
}