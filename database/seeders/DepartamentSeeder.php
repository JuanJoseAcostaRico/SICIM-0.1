<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departaments;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departaments::create([
            'departament_name' => 'Inventario General',
            'state_fke' => '1',
            'user_id' => '2',
        ]);
        Departaments::create([
            'departament_name' => 'Medicina General',
            'state_fke' => '1',
            'user_id' => '3',
        ]);
        Departaments::create([
            'departament_name' => 'Dirección General',
            'state_fke' => '1',
            'user_id' => '1',
        ]);
        Departaments::create([
            'departament_name' => 'Laboratorio',
            'state_fke' => '1',
            'user_id' => '4',
        ]);
        Departaments::create([
            'departament_name' => 'Hospitalización',
            'state_fke' => '1',
            'user_id' => '5',
        ]);
        Departaments::create([
            'departament_name' => 'Odontología',
            'state_fke' => '1',
            'user_id' => '6',
        ]);
        Departaments::create([
            'departament_name' => 'Optometría',
            'state_fke' => '1',
            'user_id' => '7',
        ]);
        Departaments::create([
            'departament_name' => 'Fisiatría',
            'state_fke' => '1',
            'user_id' => '8',
        ]);
        Departaments::create([
            'departament_name' => 'Rayos X',
            'state_fke' => '1',
            'user_id' => '9',
        ]);
    }
}
