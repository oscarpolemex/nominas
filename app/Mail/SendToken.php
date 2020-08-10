<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendToken extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Recibo de nomina";
    public $servidor,$liga;
//    public $from =array('address' => 'myusername@gmail.com', 'name' => 'hawle');
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($servidor,$liga)
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
        
        return $this->view('emails.sendToken',compact('servidor','liga'));
    }
}
