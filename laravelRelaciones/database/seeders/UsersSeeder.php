<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 // Crear 10 usuarios
 $users = Users::factory()->count(10)->create();


   
    
    }
}
