<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $usuario = User::create([
            'name'=> 'administrador2',
            'email'=>'admin2@gmail.com',
            'password'=>bcrypt('admin1234')
        ]);
       // $rol = Role::create(['name'=>'Administrador']);

        //Permission::pluck('id', 'id')->all();

       // $rol->syncPermissions($permisos);
        //$usuario->assignRole([$rol->id]);
        $usuario->assignRole('Administrador');
    }
}
