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
            'instrument_desc' => 'dispositivo acustico que amplifica
             los ruidos corporales',
            'instrument_serial_code' => 'JPXFBM7U5BPL',
            'departament_fke' => '1',
            'condition_fke' => '1',
            'created_at' => '2023-07-23 20:52:12'
        ]);
        Instruments::create([
            'instrument_name' => 'Cama Hospitalaria',
            'instrument_size' => '224 cm x 104,5 cm, 114kg',
            'instrument_desc' => 'Camilla para pacientes, tambien pueden ser
             designadas a uso particular',
            'instrument_serial_code' => 'P3XAUGMSSQTP',
            'departament_fke' => '2',
            'condition_fke' => '3',
            'created_at' => '2022-05-23 20:52:12'
        ]);
        Instruments::create([
            'instrument_name' => 'Bisturí Quirurgico 14',
            'instrument_size' => '69 cm, 150 grs',
            'instrument_desc' => 'Exclusivo para Quirófano',
            'instrument_serial_code' => '8AZE2B32VHPY',
            'departament_fke' => '1',
            'condition_fke' => '2',
            'created_at' => '2021-03-23 20:52:12'
        ]);
        Instruments::create([
            'instrument_name' => 'Pinzas médicas',
            'instrument_size' => '8 x 4 cm',
            'instrument_desc' => 'Exclusivo para quirófano',
            'instrument_serial_code' => '708D0K5TEZJU',
            'departament_fke' => '2',
            'condition_fke' => '1',
            'created_at' => '2020-01-23 20:52:12'
        ]);
        Instruments::create([
            'instrument_name' => 'Desfibrilador',
            'instrument_size' => '200 cm, 350 gr',
            'instrument_desc' => 'Dispositivo para realizar reanimaciones, en caso de paro cardiaco',
            'instrument_serial_code' => 'NSKLY2QWFIWU',
            'departament_fke' => '3',
            'condition_fke' => '1',
            'created_at' => '2019-11-23 20:52:12'
        ]);
    }
}
