<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNewsletterVerification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        //
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->to($this->message["to"]);
        //$this->replyTo($this->message["replyTo"]);
        $this->subject('Confirm your newsletter signup.');
        return $this->view('mail.newsletterverification')
        ->with([
            'email_message' => $this->message,
        ]);
    }
}
