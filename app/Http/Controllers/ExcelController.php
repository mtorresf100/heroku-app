<?php

namespace App\Http\Controllers;

use App\Excel;
use App\Http\Requests\ExcelRequest;
use App\Imports\FedexExcel;
use App\Jobs\DutyJob;
use App\Jobs\PendingJob;
use App\Jobs\ReactivationJob;
use App\Mail;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ExcelController extends Controller
{
    /**
     * Receive Excel file
     *
     * @param ExcelRequest $request
     * @return Application|Factory|View
     */
    public function index(ExcelRequest $request)
    {
        try {
            $import = new FedexExcel;
            $import->import($request->file('file-upload'));
            $secondRequest = $request->has('second-request') ? 'SECOND REQUEST / ' : null;
            $total = Excel::count();
            $pendings = Excel::whereCategory(['PENDING GCCS INFORMATION', 'PENDING ACCOUNT NUMBER'])
                         ->get()
                         ->groupBy('email_manager_collector');

            $pendingDuties = Excel::whereCategory(['PENDING D/T COLLECTION'])
                         ->get()
                         ->groupBy('email_manager_collector');

            $reactivations = Excel::whereCategory( ['REACTIVATE ACCT REQUEST'])->get()
                                ->groupBy('email_manager_collector');

            foreach ($pendings as $pending) {
                $this->dispatch( new PendingJob($pending, $secondRequest) );
            }

            foreach ($pendingDuties as $pendingDuty) {
                $this->dispatch( new DutyJob($pendingDuty, $secondRequest) );
            }

            foreach ($reactivations as $reactivation) {
                $this->dispatch( new ReactivationJob($reactivation, $secondRequest) );
            }

            $result = [
                'imported'  => $total,
                'mails'     => count($pendings) + count($reactivations),
                'table'     => [
                    $pendings->toArray(),
                    $reactivations->toArray(),
                ],
            ];

            return view('/content/home', compact( 'result'));
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            return view('/content/home', compact( 'failures'));
        }
    }


    public function mail(Mail $mail)
    {
        return $mail->body;
    }

    public function resend(Mail $mail)
    {
        try {
            $mailer = new \SendGrid\Mail\Mail();
            $tos = array_unique(explode(', ', $mail->to));
            $ccs = array_unique(explode(', ', $mail->cc));

            foreach ($tos as $value) {
                $mailer->addTo($value);
            }
            foreach ($ccs as $cc) {
                $mailer->addCC($cc);
            }

            $mailer->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            // Set email subject
            $mailer->setSubject($mail->subject);
            // Set email body
            $mailer->addContent('text/html', $mail->body);
            $file = base64_encode(file_get_contents(storage_path("app/public/{$mail->getRawOriginal('attachment')}")));
            $mailer->addAttachment($file, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', $mail->getRawOriginal('attachment'), 'attachment');
            $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));
            $response = $sendgrid->send($mailer);
            $mail->status = $response->statusCode();
            $mail->response = $response->body();
            $mail->save();
        } catch (\Exception $e) {
            // Create logs to know if has any error
            $mail->response = $e->getMessage();
            $mail->save();
        }
        return redirect()->route('log');
    }
}
