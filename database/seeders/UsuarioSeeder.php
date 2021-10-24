<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pass = '1234';
        $admin= User::create([
            'name' => 'SystemEdbar',
            'email' => 'castillo@prueba.com',
            'password' => Hash::make($pass),
        ]);
        $user = User::create([
            'name' => 'System D.',
            'email' => 'moreno@prueba.com',
            'password' => Hash::make($pass),
        ]);
        $user = User::create([
            'name' => 'SystemFerbar',
            'email' => 'leon@prueba.com',
            'password' => Hash::make($pass),
        ]);
    }
}
