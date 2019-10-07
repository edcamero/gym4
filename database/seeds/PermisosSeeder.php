<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
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
            'name'=>'listar clientes',
            'guard_name'=>'clientes.index',
            ]);
        Permission::create([
            'name'=>'detalle del  cliente',
            'guard_name'=>'clientes.show',
            ]);
        Permission::create([
            'name'=>'Edicion  de cliente',
            'guard_name'=>'clientes.edit',
            ]);
        Permission::create([
            'name'=>'Eliminar clientes',
            'guard_name'=>'clientes.destroy',
            ]);

}
}