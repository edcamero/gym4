<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermisosSeeder::class);
        $this->call(PersonaTableSeeder::class);
        $this->call(tipo_cliente_seeder::class);
        $this->call(TipoEmpleadoSeeder::class);
    }
}
