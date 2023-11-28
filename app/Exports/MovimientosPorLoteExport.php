<?php

namespace App\Exports;

use App\Models\Movements;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class MovimientosPorLoteExport implements FromCollection, WithDrawings, WithHeadings, WithMapping, ShouldAutoSize, WithCustomStartCell, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $lote;

    public function __construct($lote)
    {
        $this->lote = $lote;
    }

    public function collection()
    {
        return $this->lote;
    }

    public function startCell(): string
    {
        return 'A7';
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('banner');
        $drawing->setDescription('banner');
        $drawing->setPath(public_path('/images/banner.png'));
        $drawing->setCoordinates('D1');
        $drawing->setHeight(120);
        $drawing->setWidth(380);
        $drawing->setOffsetX(80);
        $drawing->setOffsetY(10);


        return $drawing;
    }

    private $rowStyles = [];

    public function styles(Worksheet $sheet)
    {

        if (!empty($this->rowStyles)) {

            foreach ($this->rowStyles as $row => $styleArray) {

                $sheet->getStyle($row)->applyFromArray($styleArray);
            }
        }
    }

    public function headings(): array
    {
        // Especifica los encabezados de las columnas
        $headings = [
            'ID',
            'Insumo',
            'Tipo Movimiento',
            'Lote',
            'Departamento',
            'Stock',
            'Acciones',
            'Fecha de Creación',
        ];

        $numColumns = $this->getNumberFromStartCell();

        $this->setStylesForColumns($headings, $numColumns);

        return $headings;
    }

    private function setStylesForColumns($headings, $numColumns)

    {
        foreach ($headings as $index => $heading) {
            $columnLetter = $this->getcolumnLetter($index);
            $this->rowStyles[$columnLetter . $numColumns] =
                [
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['argb' => '87CEEB'],
                    ],
                ];
        }
    }

    private function getColumnLetter($index)
    {
        $letters = range('A', 'Z');

        return $letters[$index];
    }

    private function getNumberFromStartCell()
    {
        $startCell = $this->startCell();
        $rowNumber = filter_var($startCell, FILTER_SANITIZE_NUMBER_INT);

        return $rowNumber;
    }


    public function map($movement): array
    {
        return [
            $movement->id,
            $movement->supplies->supply_name,
            $movement->movement_types->movement_type_name,
            $movement->movement_batch,
            $movement->departaments->departament_name,
            $movement->movement_stock,
            $movement->created_at,
            $movement->updated_at,
        ];
    }
}
