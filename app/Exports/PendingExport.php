<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PendingExport implements FromCollection, WithHeadings, WithMapping
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
            'CATEGORY',
            'COMMENTS',
            // 'WOFF LOCATION',
            'ASSIGNED AGENT',
            'PUP/POD AGENT',
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
            // isset($row->woff_location) ? $row->woff_location : '',
            isset($row->agent) ? $row->agent : '',
            isset($row->email_pup_pod_agent) ? $row->email_pup_pod_agent : '',
        ];
    }
}
