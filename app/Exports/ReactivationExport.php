<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ReactivationExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting
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
    * @return \Illuminate\Support\Collection
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
            'REBILLING ACCOUNT',
            'CASH DATE',
            'SHIP DATE',
            'LEGAL ENTITY CODE',
            // 'WOFF LOCATION',
            'COMMENTS',
            'ASSIGNED AGENT',
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
            isset($row->rebilling_account) ? $row->rebilling_account : '',
            isset($row->cash_date) ? $row->cash_date->format('Y-m-d') : '',
            isset($row->ship_date) ? $row->ship_date->format('Y-m-d') : '',
            isset($row->legal_entity_code) ? $row->legal_entity_code : '',
            // isset($row->woff_location) ? $row->woff_location : '',
            isset($row->comments) ? $row->comments : '',
            isset($row->agent) ? $row->agent : '',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_DATE_YYYYMMDD,
            'H' => NumberFormat::FORMAT_DATE_YYYYMMDD,
        ];
    }
}
