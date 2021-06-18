<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Cursos
        Permission::create([
            'name' => 'Crear Cursos'
        ]);
        Permission::create([
            'name' => 'Leer Cursos'
        ]);
        Permission::create([
            'name' => 'Actualizar Cursos'
        ]);
        Permission::create([
            'name' => 'Eliminar Cursos'
        ]);
        //Dashboard
        Permission::create([
            'name' => 'Ver Dashboard'
        ]);
        //Rol
        Permission::create([
            'name' => 'Crear Rol'
        ]);
        Permission::create([
            'name' => 'Listar Rol'
        ]);
        Permission::create([
            'name' => 'Editar Rol'
        ]);
        Permission::create([
            'name' => 'Eliminar Rol'
        ]);
        //usuarios
        Permission::create([
            'name' => 'Leer Usuarios'
        ]);        
        Permission::create([
            'name' => 'Editar Usuarios'
        ]);
    }
}
