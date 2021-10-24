<?php

namespace Database\Seeders;

use App\Models\Clientes;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DataDesarrolloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clientes::Factory()->count(50)->create();
    }
}
