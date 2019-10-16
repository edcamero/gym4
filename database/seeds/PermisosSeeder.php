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
        $role = Role::create(['name' => 'admin']);
        $role->save();

        foreach(config('app.modulos') as $modulo){
            foreach(config('app.permisos') as $permiso){
                $modulo_permiso=$permiso.'-'.$modulo;

                Permission::create([
                    'name'=>$modulo_permiso,
                    'guard_name'=>'web',
                    ]);
                    
                $role->givePermissionTo($modulo_permiso);
            }
        }
        
       


        
        

        

}
}