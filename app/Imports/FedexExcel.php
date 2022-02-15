<?php

namespace App\Imports;

use App\Excel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class FedexExcel implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading, WithColumnFormatting
{

    use Importable;

    public $data;

    public function __construct()
    {
        $this->data = collect();
    }

    /**
     * The excel Headers
     */
    const HEADER_AIRBILL_NUMBER = 'airbill_number';
    const HEADER_INVOICE_NUMBER = 'invoice_number';
    const HEADER_INVOICE_AGE = 'invoice_age';
    const HEADER_AIRBILL_TYPE = 'airbill_type';
    const HEADER_AIRBILL_ORIGINAL_AMOUNT_USD = 'airbill_due_usd';
    const HEADER_REBILLING_ACCOUNT = 'rebilling_account_number';
    const HEADER_CASH_DATE = 'cash_date';
    const HEADER_SHIP_DATE = 'ship_date';
    const HEADER_LEGAL_ENTITY_CODE = 'legal_entity_code';
    const HEADER_COMMENTS = 'comments';
    const HEADER_WOFF_LOCATION = 'fedex_error_location';
    const HEADER_EMAIL_PUP_POD_AGENT = 'email_pup_pod_agent';
    const HEADER_EMAIL_MANAGER_COLLECTOR = 'email_manager_collector';
    const HEADER_PENDING_CATEGORY = 'pending_category';
    const HEADER_AGENT = 'assigned_agent_email';
    const PUP_POP_AGENT = 'id_pup_pod_agent';

    public function model(array $row)
    {
        $model =  new Excel([
            'airbill_number'        => isset($row[self::HEADER_AIRBILL_NUMBER]) ? $row[self::HEADER_AIRBILL_NUMBER] : null,
            'invoice_number'        => isset($row[self::HEADER_INVOICE_NUMBER]) ? $row[self::HEADER_INVOICE_NUMBER] : null,
            'invoice_age'           => isset($row[self::HEADER_INVOICE_AGE]) ? $row[self::HEADER_INVOICE_AGE] : null,
            'airbill_type'          => isset($row[self::HEADER_AIRBILL_TYPE]) ? $row[self::HEADER_AIRBILL_TYPE] : null,
            'airbill_original_amount_usd' => isset($row[self::HEADER_AIRBILL_ORIGINAL_AMOUNT_USD]) ? $row[self::HEADER_AIRBILL_ORIGINAL_AMOUNT_USD] : null,
            'rebilling_account'      => isset($row[self::HEADER_REBILLING_ACCOUNT]) ? $row[self::HEADER_REBILLING_ACCOUNT] : null,
            'cash_date'              => isset($row[self::HEADER_CASH_DATE]) ?
                                        Date::excelToDateTimeObject($row[self::HEADER_CASH_DATE])->format('Y-m-d') : null,
            'ship_date'              => isset($row[self::HEADER_SHIP_DATE]) ?
                                        Date::excelToDateTimeObject($row[self::HEADER_SHIP_DATE])->format('Y-m-d') : null,
            'legal_entity_code'      => isset($row[self::HEADER_LEGAL_ENTITY_CODE]) ? $row[self::HEADER_LEGAL_ENTITY_CODE] : null,
            'comments'               => isset($row[self::HEADER_COMMENTS]) ? $row[self::HEADER_COMMENTS] : null,
            'woff_location'          => isset($row[self::HEADER_WOFF_LOCATION]) ? $row[self::HEADER_WOFF_LOCATION] : null,
            'email_pup_pod_agent'    => isset($row[self::HEADER_EMAIL_PUP_POD_AGENT]) ? $row[self::HEADER_EMAIL_PUP_POD_AGENT] : null,
            'email_manager_collector'=> isset($row[self::HEADER_EMAIL_MANAGER_COLLECTOR]) ? $row[self::HEADER_EMAIL_MANAGER_COLLECTOR] : null,
            'pending_category'       => isset($row[self::HEADER_PENDING_CATEGORY]) ? $row[self::HEADER_PENDING_CATEGORY] : null,
            'agent'                  => isset($row[self::HEADER_AGENT]) ? $row[self::HEADER_AGENT] : null,
            'pup_pod_agent'          => isset($row[self::PUP_POP_AGENT]) ? $row[self::PUP_POP_AGENT] : null,
        ]);

        $this->data->push($model);

        return $model;
    }

    public function rules(): array
    {
        return [
            '*.'.self::HEADER_AIRBILL_NUMBER    => 'required|numeric',
            '*.'.self::HEADER_INVOICE_NUMBER    => 'required|numeric',
            '*.'.self::HEADER_INVOICE_AGE   => 'required|numeric',
            '*.'.self::HEADER_AIRBILL_TYPE  => 'required|string|size:1',
            '*.'.self::HEADER_AIRBILL_ORIGINAL_AMOUNT_USD   => 'required',
            // '*.'.self::HEADER_REBILLING_ACCOUNT     => 'required_if:'.self::HEADER_PENDING_CATEGORY.',REACTIVATION ACCT',
            '*.'.self::HEADER_REBILLING_ACCOUNT     => function($attribute, $value, $onFailure) {
                if (Str::contains($value, 'REACT')) {
                    $onFailure(__('validation.required_if',['attribute' => $attribute, 'other' => self::HEADER_PENDING_CATEGORY, 'value' => $value]));
                }
            },
            //'*.'.self::HEADER_CASH_DATE     => 'required_if:'.self::HEADER_PENDING_CATEGORY.',REACTIVATION ACCT',
            '*.'.self::HEADER_CASH_DATE     => function($attribute, $value, $onFailure) {
                if (Str::contains($value, 'REACT')) {
                    $onFailure(__('validation.required_if',['attribute' => $attribute, 'other' => self::HEADER_PENDING_CATEGORY, 'value' => $value]));
                }
            },
            // '*.'.self::HEADER_SHIP_DATE     => 'required_if:'.self::HEADER_PENDING_CATEGORY.',REACTIVATION ACCT',
            '*.'.self::HEADER_SHIP_DATE     => function($attribute, $value, $onFailure) {
                if (Str::contains($value, 'REACT')) {
                    $onFailure(__('validation.required_if',['attribute' => $attribute, 'other' => self::HEADER_PENDING_CATEGORY, 'value' => $value]));
                }
            },
            '*.'.self::HEADER_LEGAL_ENTITY_CODE     => 'required|string|size:3',
            '*.'.self::HEADER_COMMENTS  => 'required',
            '*.'.self::HEADER_WOFF_LOCATION   => 'required|string|size:4',
            '*.'.self::HEADER_EMAIL_PUP_POD_AGENT   => 'required|email',
            '*.'.self::HEADER_EMAIL_MANAGER_COLLECTOR   => 'required|email',
            '*.'.self::HEADER_PENDING_CATEGORY  => 'required',
            '*.'.self::HEADER_AGENT     => 'required|email',
            '*.'.self::PUP_POP_AGENT     => 'required|numeric',
        ];
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function columnFormats(): array
    {
        return [
            'K' => NumberFormat::FORMAT_DATE_YYYYMMDD,
            'L' => NumberFormat::FORMAT_DATE_YYYYMMDD,
        ];
    }
}
