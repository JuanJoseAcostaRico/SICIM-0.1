<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'user_phone' => '+584247537848',
            'user_address' => 'Coloncito calle 11',
        ])->assignRole('Administrador');

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
            'user_phone' => '+584247537848',
            'user_address' => 'Coloncito calle 11',
        ])->assignRole('Empleado');
    }
}
