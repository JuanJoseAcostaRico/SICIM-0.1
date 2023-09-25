<?php

namespace App\Exports;

use App\Models\Movements;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class MovimientosPorFechasExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $start_date;
    protected $end_date;

    public function __construct($start_date = null, $end_date = null)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function collection()
    {
        // Filtra los registros de insumos basados en las fechas si se proporcionaron
        $query = Movements::query();

        if ($this->start_date && $this->end_date) {
            $query->whereBetween('created_at', [Carbon::parse($this->start_date), Carbon::parse($this->end_date)]);
        }

        return $query->get();
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
