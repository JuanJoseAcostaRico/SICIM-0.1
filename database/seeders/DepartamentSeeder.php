<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departaments;

class Departamentseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departaments::create([
            'departament_name' => 'Medicina General',
            'state_fke' => '1',
            'user_id' => '1',
        ]);
        Departaments::create([
            'departament_name' => 'Laboratorio',
            'state_fke' => '1',
            'user_id' => '1',
        ]);
        Departaments::create([
            'departament_name' => 'Hospitalización',
            'state_fke' => '1',
            'user_id' => '1',
        ]);
        Departaments::create([
            'departament_name' => 'odontología',
            'state_fke' => '1',
            'user_id' => '1',
        ]);
        Departaments::create([
            'departament_name' => 'Optometría',
            'state_fke' => '1',
            'user_id' => '1',
        ]);
        Departaments::create([
            'departament_name' => 'Fisiatría',
            'state_fke' => '1',
            'user_id' => '1',
        ]);
        Departaments::create([
            'departament_name' => 'Rayos X',
            'state_fke' => '1',
            'user_id' => '1',
        ]);
    }
}
