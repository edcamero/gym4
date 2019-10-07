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

}
}