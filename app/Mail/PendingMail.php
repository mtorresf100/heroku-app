<?php

namespace App\Mail;

use App\Exports\PendingExport;
use App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;

class PendingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Collection
     */
    private $collection;


    /**
     * Create a new message instance.
     *
     * @param Collection $collection
     */
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.pending')
                ->with([
                    'table' => $this->collection,
                    'sum'   => $this->collection->sum('airbill_original_amount_usd')
                ]);
    }
}
