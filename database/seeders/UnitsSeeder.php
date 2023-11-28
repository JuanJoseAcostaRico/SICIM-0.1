<?php

namespace Database\Seeders;

use App\Models\Units;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Units::create([
            'unit_name' => 'µg',
        ]);
        Units::create([
            'unit_name' => 'mg',
        ]);
        Units::create([
            'unit_name' => 'g',
        ]);
        Units::create([
            'unit_name' => 'kg',
        ]);
        Units::create([
            'unit_name' => 'µl',
        ]);
        Units::create([
            'unit_name' => 'ml',
        ]);
        Units::create([
            'unit_name' => 'lts',
        ]);
        Units::create([
            'unit_name' => 'mg/ml',
        ]);
        Units::create([
            'unit_name' => 'g/l',
        ]);
        Units::create([
            'unit_name' => 'mEq',
        ]);
        Units::create([
            'unit_name' => 'mEq/L',
        ]);
        Units::create([
            'unit_name' => 'mmol/L',
        ]);
        Units::create([
            'unit_name' => 'mcg/kg/min',
        ]);
        Units::create([
            'unit_name' => 'UI',
        ]);
        Units::create([
            'unit_name' => 'Sin unidad específica',
        ]);
    }
}
