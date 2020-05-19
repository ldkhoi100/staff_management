<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Message;

use App\Contact;

class ReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $contact = [];
    public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $contact, $message)
    {
        $this->name = $name;
        $this->contact = $contact;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.replyContact', ['name' => $this->name, 'contact' => $this->contact, 'mess' => $this->message])->subject("Sabbatical Leave");
    }
}