<?php

use Illuminate\Database\Seeder;
use App\Models\Horario;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $horario=new Horario();
        $horario->nombre='mornign';
        $horario->ingreso='6:00';
        $horario->salida='12:00';
        $horario->save();

        $horario=new Horario();
        $horario->nombre='tarde';
        $horario->ingreso='14:00';
        $horario->salida='16:00';
        $horario->save();
    }
}
