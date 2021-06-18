<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'maqzac@yahoo.es',
            'password' => bcrypt('admin')
        ]);
        //asignar rol al Admin
        $user->assignRole('Admin');

        User::factory(99)->create();
    }
}
