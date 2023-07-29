<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Instruments;


class InstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instruments::create([
            'instrument_name' => 'Estetoscopio',
            'instrument_size' => '69 cm, 150 grs',
            'instrument_desc' => 'dispositivo acustico que amplifica los ruidos corporales',
            'instrument_stock' => '3',
            'departament_fke' => '1',
            'condition_fke' => '1',
        ]);
    }
}
