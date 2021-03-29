<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class ReactivationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Collection
     */
    private $collection;
    /**
     * @var null
     */
    private $secondRequest;


    /**
     * Create a new message instance.
     *
     * @param Collection $collection
     * @param null $secondRequest
     */
    public function __construct(Collection $collection, $secondRequest = null)
    {
        $this->collection = $collection;
        $this->secondRequest = $secondRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.reactivation')
                    ->with([
                        'secondRequest' => $this->secondRequest,
                        'table' => $this->collection,
                        'sum'   => $this->collection->sum('airbill_original_amount_usd')
                    ]);
    }
}
