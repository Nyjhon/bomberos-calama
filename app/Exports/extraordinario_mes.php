<?php

namespace App\Exports;
use Carbon\Carbon;

use App\Modelos\extraordinario;
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

class extraordinario_mes implements 
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
    /**
    * @return \Illuminate\Database\Query\Builder
    */
    use Exportable;

    private $mes;
    private $año;

    public function fecha($mes, $año){
        $this->mes = $mes;
        $this->año = $año;
        $this->i = 1;
        return $this;
    }

    public function query()
    {
        return extraordinario::query()
            ->whereMonth('fecha_ext', $this->mes)
            ->whereYear('fecha_ext', $this->año);
    }
    public function startCell(): string
    {
        return 'A1';
    }
    public function map($extraordinario): array
    {
        return [
            $this->i++,
            Carbon::parse($extraordinario->fecha_ext)->year,
            $extraordinario->hora_ext,
            Carbon::parse($extraordinario->fecha_ext)->format('d-m-Y'),
            getMesArrayKey(Carbon::parse($extraordinario->fecha_ext)->month),
            getDepartamentoArrayKey($extraordinario->departamento),
            getProvinciaArrayKey($extraordinario->provincia),
            getDepartamentoArrayKey($extraordinario->municipio),
            $extraordinario->localidad,
            $extraordinario->zona,
            $extraordinario->calle,
            $extraordinario->coordenadas,
            $extraordinario->unidad,
            getTipoKey($extraordinario->tipo),
            $extraordinario->evento,
            $extraordinario->desplegados,
            getRemitidoExtraKey($extraordinario->remitido),
        ];
    }
    public function headings(): array
    {
        return [
            ['DEPARTAMENTO NACIONAL DE ESTADISTICA'],
            ['FORMULARIO DE SERVICIO EXTRAORDINARIOS'],
            ['GESTION '.$this->año],
            ['','','PARTE MENSUAL DE: '.getMesArrayKey($this->mes).' DE ' .$this->año],
            [
            'FORM. 08 A  COD. NUM.',
            'GESTION',
            'HORA DEL HECHO',
            'FECHA DEL HECHO',
            'MES REGISTRO',
            'DEPARTAMENTOS',
            'PROVINCIAS',
            'MUNICIPIOS',
            'LOCALIDADES',
            'ZONA O BARRIO',
            'LUGAR DEL HECHO CALLE Y/O AVENIDA',
            'GPS COORDENADAS',
            'UNIDADES, EPIs Y OTROS',
            'TIPO DE SERVICIO EXTRAORDINARIO',
            'NUM. DE EVENTO Y/O ACTIVIDAD',
            'NUM. DE GRUPOS DESPLEGADOS:',
            'REMITIDOS A:',
            ]

        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $extraordinario){
                
                $extraordinario->sheet->getStyle('A5:Q5')->applyFromArray([
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
                $extraordinario->sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'name' => 'Arial Black',
                        'size' => '16'
                    ],
                ]);
                $extraordinario->sheet->getStyle('A2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'name' => 'Arial Black',
                        'size' => '16'
                    ],
                ]);
                $extraordinario->sheet->getStyle('A3')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'name' => 'Arial Black',
                        'size' => '16'
                    ],
                ]);
                $extraordinario->sheet->getStyle('C4')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'name' => 'Arial Black',
                        'size' => '11'
                    ],
                ]);
                $extraordinario->sheet->getStyle('A5')->applyFromArray([
                    'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['rgb' => '91B248'],
                        ]
                ]);
                $extraordinario->sheet->getStyle('B5:E5')->applyFromArray([
                    'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['rgb' => 'D17B79'],
                        ]
                ]);
                $extraordinario->sheet->getStyle('F5:M5')->applyFromArray([
                    'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['rgb' => '91B248'],
                        ]
                ]);
                $extraordinario->sheet->getStyle('N5:P5')->applyFromArray([
                    'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['rgb' => '8DADD3'],
                        ]
                ]);
                $extraordinario->sheet->getStyle('Q5')->applyFromArray([
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
            'I' => 14,
            'J' => 30,
            'K' => 57,
            'L' => 25,
            'M' => 15,
            'N' => 43,
            'O' => 23,
            'P' => 20,
            'Q' => 17,           
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            'A6:Q4000'  => ['font' => ['size' => 8]],
            'L'    => ['font' => ['bold' => true]],
        ];
    }
    public function title(): string
    {
        return getMesArrayKey($this->mes).'-'.$this->año;
    }
}
