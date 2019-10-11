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
            'name'=>'TipCliente.index',
            'guard_name'=>'web',
            ]);

        $role = Role::create(['name' => 'admin']);
        $role->save();
        Permission::create([
            'name'=>'detalle del  cliente',
            'guard_name'=>'web',
            ]);
        Permission::create([
            'name'=>'Edicion  de cliente',
            'guard_name'=>'web',
            ]);
        Permission::create([
            'name'=>'Eliminar clientes',
            'guard_name'=>'web',
            ]);

}
}