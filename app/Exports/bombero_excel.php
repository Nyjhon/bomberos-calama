<?php

namespace App\Exports;
use Carbon\Carbon;

use App\Modelos\bombero;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class bombero_excel implements 
    FromQuery, 
    WithEvents,
    WithCustomStartCell,
    WithMapping,
    WithHeadings,
    ShouldAutoSize,
    WithColumnWidths,
    WithStyles,
    WithTitle
{
    
    use Exportable;

    private $fecha_suc;

    public function fecha($fecha_suc){
        $this->fecha_suc = $fecha_suc;
        $this->i = 1;
        return $this;
    }

    public function query()
    {
        return bombero::query()->where('fecha_suc', $this->fecha_suc);
    }
    public function startCell(): string
    {
        return 'A1';
    }
    public function map($bombero): array
    {
        return [
            $this->i++,
            Carbon::parse($bombero->fecha_suc)->year,
            $bombero->hora_suc,
            Carbon::parse($bombero->fecha_suc)->format('d-m-Y'),
            getMesArrayKey(Carbon::parse($bombero->fecha_suc)->month),
            getDepartamentoArrayKey($bombero->departamento),
            getProvinciaArrayKey($bombero->provincia),
            getDepartamentoArrayKey($bombero->municipio),
            $bombero->localidad,
            $bombero->unidad,
            $bombero->zona,
            $bombero->calle,
            $bombero->coordenadas,
            getAuxiliosArrayKey($bombero->auxilios),
            $bombero->causa,
            getOcurridosArrayKey($bombero->ocurrido),
            getRemitidoArrayKey($bombero->remitido_lugar),
            $bombero->datos_victima,
            $bombero->datos_arrestados,
            getEpiArrayKey($bombero->remitido_epi),
            $bombero->nombre_policia,   
        ];
    }
    public function headings(): array
    {
        return [
            ['DEPARTAMENTO NACIONAL DE ESTADISTICA'],
            ['FORMULARIO DE CASOS ATENDIDOS BOMBEROS'],
            ['GESTION '.Carbon::parse($this->fecha_suc)->year],
            ['','','PARTE DIARIO DE LA FECHA: '.Carbon::parse($this->fecha_suc)->day.' DE '.getMesArrayKey(Carbon::parse($this->fecha_suc)->month).' DE ' .Carbon::parse($this->fecha_suc)->year],
            [
            'FORM. 05 A  COD. NUM.',
            'GESTION',
            'HORA DEL HECHO',
            'FECHA DEL HECHO',
            'MES REGISTRO',
            'DEPARTAMENTOS',
            'PROVINCIAS',
            'MUNICIPIOS',
            'LOCALIDADES',
            'UNIDAD / SUB ESTACION',
            'ZONA O BARRIO',
            'LUGAR DEL HECHO CALLE Y/O AVENIDA',
            'GPS COORDENADAS',
            'DIFERENTES AUXILIOS',
            'PROBABLE CAUSA DEL HECHO',
            'HECHOS OCURRIDOS EN:',
            'REMITIDOS A:',
            'NOMBRE DE LA VICTIMA',
            'NOMBRE DEL ARRESTADO',
            'REMITIDOS A:',
            'NOMBRE COMPLETO DEL POLICIA (ACCION DIRECTA)',
            ]

        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $bombero){
                
                $bombero->sheet->getStyle('A5:U5')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'name' => 'Calibri',
                        'size' => '9'
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '0000'],
                        ],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        'wrapText' => true,
                    ],
                ]);
                $bombero->sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'name' => 'Arial Black',
                        'size' => '16'
                    ],
                ]);
                $bombero->sheet->getStyle('A2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'name' => 'Arial Black',
                        'size' => '16'
                    ],
                ]);
                $bombero->sheet->getStyle('A3')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'name' => 'Arial Black',
                        'size' => '16'
                    ],
                ]);
                $bombero->sheet->getStyle('C4')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'name' => 'Arial Black',
                        'size' => '11'
                    ],
                ]);
                $bombero->sheet->getStyle('A5')->applyFromArray([
                    'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['rgb' => '91B248'],
                        ]
                ]);
                $bombero->sheet->getStyle('B5:D5')->applyFromArray([
                    'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['rgb' => 'FFCA21'],
                        ]
                ]);
                $bombero->sheet->getStyle('E5:I5')->applyFromArray([
                    'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['rgb' => '91B248'],
                        ]
                ]);
                $bombero->sheet->getStyle('J5')->applyFromArray([
                    'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['rgb' => 'CC6C6A'],
                        ]
                ]);
                $bombero->sheet->getStyle('K5:M5')->applyFromArray([
                    'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['rgb' => '91B248'],
                        ]
                ]);
                $bombero->sheet->getStyle('N5:S5')->applyFromArray([
                    'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['rgb' => '95B3D7'],
                        ]
                ]);
                $bombero->sheet->getStyle('O5:T5')->applyFromArray([
                    'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['rgb' => '95B3D7'],
                        ]
                ]);
                $bombero->sheet->getStyle('T5:U5')->applyFromArray([
                    'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['rgb' => '91B248'],
                        ]
                ]);
            }
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 6,
            'B' => 7,
            'C' => 7,
            'D' => 9,
            'E' => 9,
            'F' => 14,
            'G' => 10,
            'H' => 10,
            'I' => 10,
            'J' => 11,
            'L' => 57,
            'K' => 25,
            'M' => 26,
            'N' => 45,
            'O' => 56,
            'P' => 23,
            'Q' => 13,
            'R' => 23,
            'S' => 30,
            'T' => 20,
            'U' => 36,            
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            'A6:U4000'  => ['font' => ['size' => 8]],
            'M'    => ['font' => ['bold' => true]],
        ];
    }
    public function title(): string
    {
        return Carbon::parse($this->fecha_suc)->format('d-m-Y');
    }

}
