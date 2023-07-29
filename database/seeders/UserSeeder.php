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
            'user_name' => 'Administrador',
            'user_email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'user_phone' => '04247537848',
            'user_address' => 'Coloncito calle 11',
        ])->assignRole('Administrador');

        User::create([
            'user_name' => 'User1',
            'user_email' => 'user1@gmail.com',
            'password' => Hash::make('12345678'),
            'user_phone' => '04247537848',
            'user_address' => 'Coloncito calle 11',
        ])->assignRole('Empleado');

        User::create([
            'user_name' => 'Director',
            'user_email' => 'tech@admin.com',
            'password' => Hash::make('12345678'),
            'user_phone' => '04247537848',
            'user_address' => 'Coloncito calle 11',
        ])->assignRole('Administrador');

        User::create([
            'user_name' => 'User2',
            'user_email' => 'user2@gmail.com',
            'password' => Hash::make('12345678'),
            'user_phone' => '04247537848',
            'user_address' => 'Coloncito calle 11',
        ])->assignRole('Empleado');
    }
}
