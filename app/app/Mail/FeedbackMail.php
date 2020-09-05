<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\App;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FeedbackMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $body;
    public $locale;
    private $user;

    /**
     * Create a new message instance.
     *
     * @param $body
     * @param $user
     * @param $locale
     */
    public function __construct($body, $user, $locale)
    {
        $this->body = $body;
        $this->user = $user;
        $this->locale = $locale;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.template')
            ->from($this->user->email, $this->user->name)
            ->subject("scout-portfolio.ru")
            ->locale($this->locale);
    }
}