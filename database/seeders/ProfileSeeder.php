<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;


class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'photo' => 'IMAGEN 1 ESTANDAR',
            'user_id' => '1',
        ]);
        Profile::create([
            'photo' => 'IMAGEN 2 ESTANDAR',
            'user_id' => '2',
        ]);
    }
}
