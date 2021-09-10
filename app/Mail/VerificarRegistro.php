<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificarRegistro extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $correo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $correo)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $nombre = $this->nombre;
        $correo = $this->correo;
        return $this->markdown('emails.verificar.verificar', compact('nombre', 'correo'));
    }
}
