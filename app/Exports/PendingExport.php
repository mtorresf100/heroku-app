<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PendingExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithColumnWidths
{

    /**
     * @var Collection
     */
    private $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
    * @return Collection
    */
    public function collection()
    {
        return $this->collection;
    }

    public function headings(): array
    {
        return [
            'AWB',
            'INVOICE',
            'INVOICE AGE',
            'TYPE (F/D)',
            'AMOUNT DUE (USD)',
            'CATEGORY',
            'COMMENTS',
            'FEDEX ERROR LOCATION',
            // 'ASSIGNED AGENT',
            // 'PUP/POD AGENT',
            'ID PUP/POD AGENT',
        ];
    }

    public function map($row): array
    {
        return [
            isset($row->airbill_number) ? $row->airbill_number : '',
            isset($row->invoice_number) ? $row->invoice_number : '',
            isset($row->invoice_age) ? $row->invoice_age : '',
            isset($row->airbill_type) ? $row->airbill_type : '',
            isset($row->airbill_original_amount_usd) ? $row->airbill_original_amount_usd : '',
            isset($row->pending_category) ? $row->pending_category : '',
            isset($row->comments) ? $row->comments : '',
            isset($row->woff_location) ? $row->woff_location : '',
            // isset($row->agent) ? $row->agent : '',
            // isset($row->email_pup_pod_agent) ? $row->email_pup_pod_agent : '',
            isset($row->pup_pod_agent) ? $row->pup_pod_agent : '',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:I1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => [
                    'argb' => Color::COLOR_WHITE
                ]
            ],
            'alignment' => [
                 'horizontal'   => Alignment::HORIZONTAL_CENTER,
                 'vertical'     => Alignment::VERTICAL_CENTER,
                 'textRotation' => 0,
                 'wrapText'     => TRUE
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'rotation' => 90,
                'startColor' => [
                    'rgb' => '8673A1',
                ],
                'endColor' => [
                    'rgb' => '8673A1',
                ],
            ]
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'G' => 40,
        ];
    }
}
