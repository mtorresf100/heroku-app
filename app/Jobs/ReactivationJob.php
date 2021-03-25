<?php

namespace App\Jobs;

use App\Exports\ReactivationExport;
use App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ReactivationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Collection
     */
    private $collection;

    /**
     * @var string
     */
    private $subject = 'SECOND REQUEST / Citycenter research process: Reactivate acc request. Potential written-off to your city center';

    /**
     * Create a new job instance.
     *
     * @param Collection $collection
     */
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * Execute the job.
     *
     * @param \SendGrid\Mail\Mail $mailer
     * @return void
     */
    public function handle(\SendGrid\Mail\Mail $mailer)
    {
        $name = "REACTIVATION_".now()->format('YmdHis').'_'.Str::random(9).".xlsx";
        Excel::store(new ReactivationExport($this->collection), $name, 'public', \Maatwebsite\Excel\Excel::XLSX);
        $mail = new Mail();
        $to    = $this->collection->unique('email_manager_collector')->pluck('email_manager_collector')->toArray();
        $copy  = $this->collection->unique('email_pup_pod_agent')->pluck('email_pup_pod_agent')->toArray();
        $agents = $this->collection->unique('agent')->pluck('agent')->toArray();
        $tos = implode(', ', array_unique(array_merge($to, $copy)));
        $ccs = implode(', ', $agents);
        $template = (new Mail\ReactivationMail($this->collection))->render();
        $mail->fill([
            'to' => $tos,
            'cc' => $ccs,
            'subject' => $this->subject,
            'attachment' => $name,
            'body'  => $template,
        ]);
        $mail->save();
        try {
            $recipients = array_unique(array_merge($to, $copy));
            foreach ($recipients as $value) {
                $mailer->addTo($value);
            }
            foreach ($agents as $value) {
                $mailer->addCC($value);
            }
            $mailer->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            // Set email subject
            $mailer->setSubject($this->subject);
            // Set email body
            $mailer->addContent('text/html', $template);
            $file = base64_encode(file_get_contents(storage_path("app/public/{$name}")));
            $mailer->addAttachment($file, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', $name, 'attachment');
            $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));
            $response = $sendgrid->send($mailer);
            $mail->status = $response->statusCode();
            $mail->response = $response->body();
            $mail->save();
            foreach ($this->collection as $collection) {
                \App\Excel::query()->where('id', $collection->id)->delete();
            }
        } catch (\Exception $e) {
            // Create logs to know if has any error
            $mail->response = $e->getMessage();
            $mail->save();
        }
    }
}
