<?php

namespace App\Exports;

use App\Models\Movements;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class MovimientosExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Movements::all();
    }

    public function headings(): array
    {
        // Especifica los encabezados de las columnas
        return [
            'ID',
            'Descripción',
            'Stock',
            'Tipo de Movimiento',
            'insumo',
            'Fecha de Creación',
            'Fecha de Actualización',
        ];
    }

    public function map($movement): array
    {
        return [
            $movement->id,
            $movement->movement_desc,
            $movement->movement_stock,
            $movement->movement_types->movement_type_name,
            $movement->supplies->supply_name,
            $movement->created_at,
            $movement->updated_at,
        ];
    }
}
