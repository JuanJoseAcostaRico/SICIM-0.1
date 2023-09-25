<?php

namespace App\Exports;

use App\Models\Instruments;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class InstrumentosExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Instruments::all();
    }

    public function headings(): array
    {
        // Especifica los encabezados de las columnas
        return [
            'ID',
            'Nombre',
            'Tamaño',
            'Descripción',
            'Stock',
            'Departamento',
            'Condición',
            'Fecha de Creación',
            'Fecha de Actualización',
        ];
    }

    public function map($instrument): array
    {
        return [
            $instrument->id,
            $instrument->instrument_name,
            $instrument->instrument_size,
            $instrument->instrument_desc,
            $instrument->instrument_stock,
            $instrument->departaments->departament_name,
            $instrument->conditions->condition_name,
            $instrument->created_at,
            $instrument->updated_at,
        ];
    }
}
