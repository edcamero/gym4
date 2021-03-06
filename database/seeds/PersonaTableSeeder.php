<?php

use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\User;

class PersonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $user=new User();
        $user->nickname='Enyer';
        $user->email='blade_liger13@hotmail.com';
        $user->password='$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';// password
        //$user->givePermissionTo('TipoCliente.index');
        $user->save();
        $user->assignRole('admin');

        $user=new User();
        $user->nickname='Carlos';
        $user->email='Carlos@hotmail.com';
        $user->password='$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';// password
        $user->save();

        $persona=new Persona();
        $persona->tipo_doc=1;
        $persona->documento='192';
        $persona->nombre='enyerson';
        $persona->apellido='camero';
        $persona->fecha_nac='2016-05-02';
        $persona->sexo='Masculino';
        $persona->telefono='3213198063';
        $persona->direccion='calle 20 #6-12';
        $persona->altura=172;
        $persona->foto='iiiiiiiiiii';
        $persona->user_id = 1;
        $persona->save();

        $persona=new Persona();
        $persona->tipo_doc=1;
        $persona->documento = '12345';
        $persona->nombre    = 'Carlos';
        $persona->apellido  = 'Fuentes';
        $persona->fecha_nac = '2016-05-02';
        $persona->sexo      = 'Masculino';
        $persona->telefono  = '3213198063';
        $persona->direccion = 'calle 20 #6-12';
        $persona->altura    =  172;
        $persona->foto      = 'iiiiiiiiiii';
        $persona->user_id   =  2;
        $persona->save();

        

    }
}
