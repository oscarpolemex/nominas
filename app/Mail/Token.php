<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

ini_set('memory_limit', '-1');

class Token extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $servidor;
    public $liga;

    public function __construct($servidor, $liga)
    {
        $this->servidor = $servidor;
        $this->liga = $liga;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $servidor = $this->servidor;
        $liga = $this->liga;
        return $this->markdown('emails.token.token', compact("servidor", "liga"));
    }
}
