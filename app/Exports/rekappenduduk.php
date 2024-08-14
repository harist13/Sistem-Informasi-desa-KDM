<?php

namespace App\Exports;

use App\Models\RekapulasiPenduduk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class rekappenduduk implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnFormatting
{
    public function collection()
    {
        $data = RekapulasiPenduduk::with('petugas')->get();
        $totals = $this->calculateTotals($data);
        
        return $data->push(new RekapulasiPenduduk($totals));
    }

    private function calculateTotals($collection)
    {
        return [
            'RT' => $collection->sum('RT'),
            'KK' => $collection->sum('KK'),
            'LAKI_LAKI' => $collection->sum('LAKI_LAKI'),
            'PEREMPUAN' => $collection->sum('PEREMPUAN'),
            'BH' => $collection->sum('BH'),
            'BS' => $collection->sum('BS'),
            'TK' => $collection->sum('TK'),
            'SD' => $collection->sum('SD'),
            'SLTP' => $collection->sum('SLTP'),
            'SLTA' => $collection->sum('SLTA'),
            'PT' => $collection->sum('PT'),
            'TANI' => $collection->sum('TANI'),
            'DAGANG' => $collection->sum('DAGANG'),
            'PNS' => $collection->sum('PNS'),
            'TNI' => $collection->sum('TNI'),
            'SWASTA' => $collection->sum('SWASTA'),
            'ISLAM' => $collection->sum('ISLAM'),
            'KHALOTIK' => $collection->sum('KHALOTIK'),
            'PROTESTAN' => $collection->sum('PROTESTAN'),
            'WNI' => $collection->sum('WNI'),
            'WNA' => $collection->sum('WNA'),
            'LK1' => $collection->sum('LK1'),
            'PR1' => $collection->sum('PR1'),
            'LK2' => $collection->sum('LK2'),
            'PR2' => $collection->sum('PR2'),
            'LK3' => $collection->sum('LK3'),
            'PR3' => $collection->sum('PR3'),
            'LK4' => $collection->sum('LK4'),
            'PR4' => $collection->sum('PR4'),
            'KK2' => $collection->sum('KK2'),
            'LK5' => $collection->sum('LK5'),
            'PR5' => $collection->sum('PR5'),
            'KETERANGAN' => $collection->sum('KETERANGAN'),

        ];
    }

    public function headings(): array
    {
        return [
            [
                'NO', 'NAMA RT', 'RT', 'KK', 
                'JUMLAH AWAL', 'JUMLAH AWAL', 
                'PENDUDUK MENURUT', 'PENDUDUK MENURUT', 'PENDUDUK MENURUT', 'PENDUDUK MENURUT', 'PENDUDUK MENURUT', 'PENDUDUK MENURUT', 'PENDUDUK MENURUT', 'PENDUDUK MENURUT', 'PENDUDUK MENURUT', 'PENDUDUK MENURUT', 'PENDUDUK MENURUT', 'PENDUDUK MENURUT', 'PENDUDUK MENURUT', 'PENDUDUK MENURUT', 'PENDUDUK MENURUT', 'PENDUDUK MENURUT', 'PENDUDUK MENURUT',
                'MUTASI', 'MUTASI', 'MUTASI', 'MUTASI', 'MUTASI', 'MUTASI', 'MUTASI', 'MUTASI',
                'JUMLAH AKHIR', 'JUMLAH AKHIR', 'JUMLAH AKHIR',
                'KETERANGAN'
            ],
            [
                '', '', '', '', 
                'LAKI-LAKI', 'PEREMPUAN', 
                'PENDIDIKAN', 'PENDIDIKAN', 'PENDIDIKAN', 'PENDIDIKAN', 'PENDIDIKAN', 'PENDIDIKAN', 'PENDIDIKAN',
                'MATA PENCAHARIAN', 'MATA PENCAHARIAN', 'MATA PENCAHARIAN', 'MATA PENCAHARIAN', 'MATA PENCAHARIAN',
                'AGAMA', 'AGAMA', 'AGAMA',
                'KEWARGANEGARAAN', 'KEWARGANEGARAAN',
                'LAHIR', 'LAHIR', 'MATI', 'MATI', 'PINDAH', 'PINDAH', 'DATANG', 'DATANG',
                'KK', 'LK', 'PR',
                ''
            ],
            [
                '', '', '', '', '', '',
                'BH', 'BS', 'TK', 'SD', 'SLTP', 'SLTA', 'PT',
                'TANI', 'DAGANG', 'PNS', 'TNI', 'SWASTA',
                'ISLAM', 'KHALOTIK', 'PROTESTAN',
                'WNI', 'WNA',
                'LK', 'PR', 'LK', 'PR', 'LK', 'PR', 'LK', 'PR',
                '', '', '',
                ''
            ],
        ];
    }

    public function map($rekapulasi): array
    {
        if ($rekapulasi->id === null) {
            return [
                'Jumlah',
                '',
                $rekapulasi->RT,
                $rekapulasi->KK,
                $rekapulasi->LAKI_LAKI,
                $rekapulasi->PEREMPUAN,
                $rekapulasi->BH,
                $rekapulasi->BS,
                $rekapulasi->TK,
                $rekapulasi->SD,
                $rekapulasi->SLTP,
                $rekapulasi->SLTA,
                $rekapulasi->PT,
                $rekapulasi->TANI,
                $rekapulasi->DAGANG,
                $rekapulasi->PNS,
                $rekapulasi->TNI,
                $rekapulasi->SWASTA,
                $rekapulasi->ISLAM,
                $rekapulasi->KHALOTIK,
                $rekapulasi->PROTESTAN,
                $rekapulasi->WNI,
                $rekapulasi->WNA,
                $rekapulasi->LK1,
                $rekapulasi->PR1,
                $rekapulasi->LK2,
                $rekapulasi->PR2,
                $rekapulasi->LK3,
                $rekapulasi->PR3,
                $rekapulasi->LK4,
                $rekapulasi->PR4,
                $rekapulasi->KK2,
                $rekapulasi->LK5,
                $rekapulasi->PR5,
                $rekapulasi->KETERANGAN,
                
            ];
        }

        return [
            $rekapulasi->id,
            $rekapulasi->nama_rt,
            $rekapulasi->RT,
            $rekapulasi->KK,
            $rekapulasi->LAKI_LAKI,
            $rekapulasi->PEREMPUAN,
            $rekapulasi->BH,
            $rekapulasi->BS,
            $rekapulasi->TK,
            $rekapulasi->SD,
            $rekapulasi->SLTP,
            $rekapulasi->SLTA,
            $rekapulasi->PT,
            $rekapulasi->TANI,
            $rekapulasi->DAGANG,
            $rekapulasi->PNS,
            $rekapulasi->TNI,
            $rekapulasi->SWASTA,
            $rekapulasi->ISLAM,
            $rekapulasi->KHALOTIK,
            $rekapulasi->PROTESTAN,
            $rekapulasi->WNI,
            $rekapulasi->WNA,
            $rekapulasi->LK1,
            $rekapulasi->PR1,
            $rekapulasi->LK2,
            $rekapulasi->PR2,
            $rekapulasi->LK3,
            $rekapulasi->PR3,
            $rekapulasi->LK4,
            $rekapulasi->PR4,
            $rekapulasi->KK2,
            $rekapulasi->LK5,
            $rekapulasi->PR5,
            $rekapulasi->KETERANGAN,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A1:A3');
        $sheet->mergeCells('B1:B3');
        $sheet->mergeCells('C1:C3');
        $sheet->mergeCells('D1:D3');
        $sheet->mergeCells('E1:F1');
        $sheet->mergeCells('G1:W1');
        $sheet->mergeCells('X1:AE1');
        $sheet->mergeCells('AF1:AH1');
        $sheet->mergeCells('AI1:AI3');

        $sheet->mergeCells('E2:E3');
        $sheet->mergeCells('F2:F3');
        $sheet->mergeCells('G2:M2');
        $sheet->mergeCells('N2:R2');
        $sheet->mergeCells('S2:U2');
        $sheet->mergeCells('V2:W2');
        $sheet->mergeCells('X2:Y2');
        $sheet->mergeCells('Z2:AA2');
        $sheet->mergeCells('AB2:AC2');
        $sheet->mergeCells('AD2:AE2');
        $sheet->mergeCells('AF2:AF3');
        $sheet->mergeCells('AG2:AG3');
        $sheet->mergeCells('AH2:AH3');

        $lastRow = $sheet->getHighestRow();
        $sheet->getStyle('A' . $lastRow . ':AI' . $lastRow)->applyFromArray([
            'font' => ['bold' => true],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'F3F4F6'],
            ],
        ]);

        // Add yellow background and borders to header
        $sheet->getStyle('A1:AI3')->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'FFFF00'],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        return [
            1    => ['font' => ['bold' => true]],
            2    => ['font' => ['bold' => true]],
            3    => ['font' => ['bold' => true]],
            'A1:AI3' => ['alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER]],
            $lastRow    => ['font' => ['bold' => true]],
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER,
            'C' => NumberFormat::FORMAT_NUMBER,
            'D' => NumberFormat::FORMAT_NUMBER,
            'E' => NumberFormat::FORMAT_NUMBER,
            'F' => NumberFormat::FORMAT_NUMBER,
            'G' => NumberFormat::FORMAT_NUMBER,
            'H' => NumberFormat::FORMAT_NUMBER,
            'I' => NumberFormat::FORMAT_NUMBER,
            'J' => NumberFormat::FORMAT_NUMBER,
            'K' => NumberFormat::FORMAT_NUMBER,
            'L' => NumberFormat::FORMAT_NUMBER,
            'M' => NumberFormat::FORMAT_NUMBER,
            'N' => NumberFormat::FORMAT_NUMBER,
            'O' => NumberFormat::FORMAT_NUMBER,
            'P' => NumberFormat::FORMAT_NUMBER,
            'Q' => NumberFormat::FORMAT_NUMBER,
            'R' => NumberFormat::FORMAT_NUMBER,
            'S' => NumberFormat::FORMAT_NUMBER,
            'T' => NumberFormat::FORMAT_NUMBER,
            'U' => NumberFormat::FORMAT_NUMBER,
            'V' => NumberFormat::FORMAT_NUMBER,
            'W' => NumberFormat::FORMAT_NUMBER,
            'X' => NumberFormat::FORMAT_NUMBER,
            'Y' => NumberFormat::FORMAT_NUMBER,
            'Z' => NumberFormat::FORMAT_NUMBER,
            'AA' => NumberFormat::FORMAT_NUMBER,
            'AB' => NumberFormat::FORMAT_NUMBER,
            'AC' => NumberFormat::FORMAT_NUMBER,
            'AD' => NumberFormat::FORMAT_NUMBER,
            'AE' => NumberFormat::FORMAT_NUMBER,
            'AF' => NumberFormat::FORMAT_NUMBER,
            'AG' => NumberFormat::FORMAT_NUMBER,
            'AH' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}