<?php

use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $e             = new Empleado();
        $e->tip_emp_id = 1;
        $e->per_id     = 1;
        $e->save();

        $e             = new Empleado();
        $e->tip_emp_id = 2;
        $e->per_id     = 2;
        $e->save();
    }
}