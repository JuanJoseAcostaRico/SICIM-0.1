<?php

namespace App\Exports;

use App\Models\Instruments;
use App\Models\Departaments;
use App\Models\Conditions;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InstrumentosPorDepartamentosExport implements FromCollection, WithDrawings, WithHeadings, WithMapping, ShouldAutoSize, WithCustomStartCell, WithStyles
{
    protected $instrumentos;
    protected $departamento;

    public function __construct($instrumentos, $departamento)
    {
        $this->instrumentos = $instrumentos;
        $this->departamento = $departamento;
    }

    public function collection()
    {
        return $this->instrumentos;
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
        $headings = [
            'ID',
            'Nombre',
            'Tamaño',
            'Descripción',
            'Serial',
            'Departamento',
            'Condición',
            'Fecha de Creación',
            'Fecha de Actualización',
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

    public function map($instrumentos): array
    {
        return [
            $instrumentos->id,
            $instrumentos->instrument_name,
            $instrumentos->instrument_size,
            $instrumentos->instrument_desc,
            $instrumentos->instrument_serial_code,
            $instrumentos->departaments->departament_name, // Accede al nombre del departamento
            $instrumentos->conditions->condition_name,
            $instrumentos->created_at,
            $instrumentos->updated_at,
        ];
    }
}
