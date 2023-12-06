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
            'user_name' => 'Francis Corredor',
            'user_email' => 'admin@admin.com',
            'user_password' => Hash::make('12345678'),
            'user_phone' => '04247523967',
            'user_address' => 'Coloncito calle 10',
        ])->assignRole('Administrador');

        User::create([
            'user_name' => 'Weine León',
            'user_email' => 'user1@gmail.com',
            'user_password' => Hash::make('12345678'),
            'user_phone' => '04121391707',
            'user_address' => 'Coloncito calle 11',
        ])->assignRole('Usuario');

        User::create([
            'user_name' => 'Enny Mendoza',
            'user_email' => 'user2@gmail.com',
            'user_password' => Hash::make('12345678'),
            'user_phone' => '04247475267',
            'user_address' => 'Coloncito calle 12',
        ])->assignRole('Usuario');

        User::create([
            'user_name' => 'María Toro',
            'user_email' => 'user3@gmail.com',
            'user_password' => Hash::make('12345678'),
            'user_phone' => '04247537848',
            'user_address' => 'Coloncito calle 13',
        ])->assignRole('Usuario');

        User::create([
            'user_name' => 'Galo Moreno',
            'user_email' => 'user4@gmail.com',
            'user_password' => Hash::make('12345678'),
            'user_phone' => '04247537848',
            'user_address' => 'Coloncito calle 9',
        ])->assignRole('Usuario');

        User::create([
            'user_name' => 'Tobías Olivera',
            'user_email' => 'user5@gmail.com',
            'user_password' => Hash::make('12345678'),
            'user_phone' => '04247537848',
            'user_address' => 'Coloncito calle 8',
        ])->assignRole('Usuario');

        User::create([
            'user_name' => 'Karol Aguilar',
            'user_email' => 'user6@gmail.com',
            'user_password' => Hash::make('12345678'),
            'user_phone' => '04247537848',
            'user_address' => 'Coloncito calle 7',
        ])->assignRole('Usuario');

        User::create([
            'user_name' => 'Saul Rocha',
            'user_email' => 'user7@gmail.com',
            'user_password' => Hash::make('12345678'),
            'user_phone' => '04247537848',
            'user_address' => 'Coloncito calle 6',
        ])->assignRole('Usuario');

        User::create([
            'user_name' => 'Simón Centeno',
            'user_email' => 'user8@gmail.com',
            'user_password' => Hash::make('12345678'),
            'user_phone' => '04247537848',
            'user_address' => 'Coloncito calle 6',
        ])->assignRole('Usuario');
    }
}
