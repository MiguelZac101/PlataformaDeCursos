<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //eliminar carpeta public/storage si existe
        Storage::deleteDirectory('cursos');
        //crea carpeta en public/storage
        Storage::makeDirectory('cursos');

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PriceSeeder::class);

        $this->call(PlatformSeeder::class);//se utiliza en Course por eso debe ir antes
        $this->call(CourseSeeder::class);        
    }
}
