<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'=>'listar-tipo-cliente',
            'guard_name'=>'web',
            ]);
        Permission::create([
            'name'=>'guardar-tipo-cliente',
            'guard_name'=>'web',
            ]);

        Permission::create([
            'name'=>'editar-tipo-cliente',
            'guard_name'=>'web',
            ]);

        Permission::create([
            'name'=>'eliminar-tipo-cliente',
            'guard_name'=>'web',
            ]);



        
        $role = Role::create(['name' => 'admin']);
        $role->save();
        

}
}