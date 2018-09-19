<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $letter;

    /**
     * Create a new letter instance.
     *
     * @return void
     */
    public function __construct($email, $letter)
    {
        $this->email = $email;
        $this->letter = $letter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contactus');
    }
}
