<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\Conditions;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conditions::create([
            'condition_name' => 'Nuevo',
        ]);
        Conditions::create([
            'condition_name' => 'Buen Estado',
        ]);
        Conditions::create([
            'condition_name' => 'Regular',
        ]);
        Conditions::create([
            'condition_name' => 'Mal estado',
        ]);
        Conditions::create([
            'condition_name' => 'Dañado',
        ]);
    }
}
