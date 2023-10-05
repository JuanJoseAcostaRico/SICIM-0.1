<?php

namespace Database\Seeders;

use App\Models\Movements;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movements::create([
            'movement_types_fke' => '1',
            'movement_desc' => 'Ingreso Gasas',
            'supply_fke' => '1',
            'movement_stock' => '10',
            'created_at' => '2023-07-23 20:52:12'
        ]);
        Movements::create([
            'movement_types_fke' => '2',
            'movement_desc' => 'Egreso Gasas',
            'supply_fke' => '1',
            'movement_stock' => '30',
            'created_at' => '2022-05-23 20:52:12'
        ]);
        Movements::create([
            'movement_types_fke' => '1',
            'movement_desc' => 'Ingreso Loratadina',
            'supply_fke' => '2',
            'movement_stock' => '20',
            'created_at' => '2021-03-23 20:52:12'
        ]);
        Movements::create([
            'movement_types_fke' => '1',
            'movement_desc' => 'Ingreso Acetaminofen',
            'supply_fke' => '3',
            'movement_stock' => '40',
            'created_at' => '2020-01-23 20:52:12'
        ]);
        Movements::create([
            'movement_types_fke' => '1',
            'movement_desc' => 'Ingreso Clonazepam',
            'supply_fke' => '4',
            'movement_stock' => '50',
            'created_at' => '2019-11-23 20:52:12'
        ]);
        Movements::create([
            'movement_types_fke' => '1',
            'movement_desc' => 'Ingreso Antibioticos',
            'supply_fke' => '5',
            'movement_stock' => '10',
            'created_at' => '2018-09-23 20:52:12'
        ]);
    }
}
