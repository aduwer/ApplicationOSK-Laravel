<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use RealRashid\SweetAlert\Facades\Alert;
class contactMail extends Mailable
{
    public $personalData;
    public $email;
    public $message;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($personalData,$email,$message)
    {
        $this->personalData=$personalData;
        $this->email=$email;
        $this->message=$message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact')->subject("Wiadomość z formularza kontaktowego.");
    }
}
