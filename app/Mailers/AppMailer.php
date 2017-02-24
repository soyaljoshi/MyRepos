<?php
namespace App\Mailers;

use App\Models\Invoice;
use Illuminate\Contracts\Mail\Mailer;

class AppMailer
{
    /**
     * The Laravel Mailer instance.
     *
     * @var Mailer
     */
    protected $mailer;

    /**
     * The sender of the email.
     *
     * @var string
     */
    protected $from = 'no-reply@mavorion.com';

    /**
     * The recipient of the email.
     *
     * @var string
     */
    protected $to;

    /**
     * The bcc recipient of the email.
     *
     * @var string
     */
    protected $bcc = [];

    /**
     * The subject of the email.
     *
     * @var string
     */
    protected $subject;

    /**
     * The view for the email.
     *
     * @var string
     */
    protected $view;

    /**
     * The data associated with the view for the email.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Create a new app mailer instance.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     *Sending mail
     *
     * @param Invoice $invoice
     * @return bool
     */
    public function sendFeedback($request)
    {   
        
        $to = setting('email');
        $view = 'frontend.emails.feedback';
        $subject = $request->get('subject');
        $data = $request->all();
        $this->mailer->queue($view, ['data' => $data], function ($message) use($subject, $to) {
            $message->from('no-reply@mavorion.com','Mavorion');
            $message->subject($subject);
            $message->to($to);
        });
    }
    /**
     * Deliver the email.
     *
     * @return void
     */
    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function ($message) {
            $message->from($this->from, 'Mavorion Systems');
            $message->subject($this->subject);
            $message->to($this->to);
            $message->bcc($this->bcc);
        });
    }
}