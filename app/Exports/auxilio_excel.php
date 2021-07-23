<?php

namespace App\Exports;
use Carbon\Carbon;

use App\Modelos\auxilio;
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

class auxilio_excel implements 
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

    private $fecha_aux;

    public function fecha($fecha_aux){
        $this->fecha_aux = $fecha_aux;
        $this->i = 1;
        return $this;
    }

    public function query()
    {
        return auxilio::query()->where('fecha_aux', $this->fecha_aux);
    }
    public function startCell(): string
    {
        return 'A1';
    }
    public function map($auxilio): array
    {   
        return [
            $this->i++,
            Carbon::parse($auxilio->fecha_aux)->year,
            $auxilio->hora_aux,
            Carbon::parse($auxilio->fecha_aux)->format('d-m-Y'),
            getMesArrayKey(Carbon::parse($auxilio->fecha_aux)->month),
            getDepartamentoArrayKey($auxilio->departamento),
            getProvinciaArrayKey($auxilio->provincia),
            getDepartamentoArrayKey($auxilio->municipio),
            $auxilio->localidad,
            $auxilio->zona,
            $auxilio->calle,
            $auxilio->coordenadas,
            $auxilio->unidad,
            $auxilio->nombre_apellido,
            $auxilio->cedula,
            $auxilio->nacido_en,
            $auxilio->nacionalidad,
            $auxilio->edad,
            getGeneroArrayKey($auxilio->genero),
            getTemperanciaArrayKey($auxilio->temperancia),
            getCapacidadKey($auxilio->capacidad_dif),
            getAuxiliosKey($auxilio->auxilios),
            getRemitidoKey($auxilio->remitido_lugar),
            $auxilio->nombre_policia,
        ];
    }
    public function headings(): array
    {
        return [
            ['DEPARTAMENTO NACIONAL DE ESTADISTICA'],
            ['FORMULARIO DE AUXILIOS'],
            ['GESTION '.Carbon::parse($this->fecha_aux)->year],
            ['','','PARTE DIARIO DE LA FECHA: '.Carbon::parse($this->fecha_aux)->day.' DE '.getMesArrayKey(Carbon::parse($this->fecha_aux)->month).' DE ' .Carbon::parse($this->fecha_aux)->year],
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
            'ZONA O BARRIO',
            'LUGAR DEL HECHO DESCRIPCIÓN (AVENIDA/CALLE)',
            'GPS COORDENADAS',
            'UNIDAD DE BOMBEROS, EPIS Y OTROS',
            'NOMBRE Y APELLIDO',
            'NUMERO DE C.I.',
            'NACIDO EN:',
            'NACIONALIDAD',
            'EDADES',
            'GENERO',
            'TEMPERANCIA',
            'PERSONAS CON CAPACIDADES DIFERENTES',
            'DIFERENTES AUXILIOS',
            'REMITIDOS A:',
            'NOMBRE COMPLETO DEL POLICIA (ACCION DIRECTA)',
            ]
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $A){
                
                $A->sheet->getStyle('A5:X5')->applyFromArray([
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
                $A->sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'name' => 'Arial Black',
                        'size' => '16'
                    ],
                ]);
                $A->sheet->getStyle('A2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'name' => 'Arial Black',
                        'size' => '16'
                    ],
                ]);
                $A->sheet->getStyle('A3')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'name' => 'Arial Black',
                        'size' => '16'
                    ],
                ]);
                $A->sheet->getStyle('C4')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'name' => 'Arial Black',
                        'size' => '11'
                    ],
                ]);
                $A->sheet->getStyle('A5')->applyFromArray([
                    'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['rgb' => '91B248'],
                        ]
                ]);
                $A->sheet->getStyle('B5:E5')->applyFromArray([
                    'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['rgb' => '50AEC8'],
                        ]
                ]);
                $A->sheet->getStyle('F5:M5')->applyFromArray([
                    'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['rgb' => '91B248'],
                        ]
                ]);
                $A->sheet->getStyle('N5:U5')->applyFromArray([
                    'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['rgb' => 'DA9694'],
                        ]
                ]);

                $A->sheet->getStyle('V5:X5')->applyFromArray([
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
            'J' => 15,
            'K' => 50,
            'L' => 25,
            'M' => 15,
            'N' => 30,
            'O' => 11,
            'P' => 11,
            'Q' => 13,
            'R' => 10,
            'S' => 10,
            'T' => 10,
            'U' => 18,
            'U' => 64,
            'U' => 30,
            'U' => 38,            
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            'A6:X4000'  => ['font' => ['size' => 8]],
            'M'    => ['font' => ['bold' => true]],
        ];
    }
    public function title(): string
    {
        return Carbon::parse($this->fecha_aux)->format('d-m-Y');
    }
}
