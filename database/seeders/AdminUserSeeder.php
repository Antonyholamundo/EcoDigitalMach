<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar si el usuario ya existe para no duplicarlo o dar error
        if (!User::where('email', 'admin@ecodigital.com')->exists()) {
            User::create([
                'name' => 'Administrador',
                'email' => 'admin@ecodigital.com',
                'password' => Hash::make('admin123'),
            ]);
        }
    }
}
