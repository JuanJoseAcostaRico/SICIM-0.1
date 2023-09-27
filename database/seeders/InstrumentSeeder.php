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
            'instrument_serial_code' => 'JPXFBM7U5BPL',
            'departament_fke' => '1',
            'condition_fke' => '1',
        ]);
        Instruments::create([
            'instrument_name' => 'Camilla',
            'instrument_size' => '2 m, 15 kg',
            'instrument_desc' => 'camilla para pacientes',
            'instrument_serial_code' => 'P3XAUGMSSQTP',
            'departament_fke' => '2',
            'condition_fke' => '1',
        ]);
    }
}
