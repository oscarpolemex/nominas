<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCitaConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $fecha, $evento, $descripcion, $servidor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fecha, $evento, $descripcion, $servidor)
    {
        $this->fecha = $fecha;
        $this->evento = $evento;
        $this->descripcion = $descripcion;
        $this->servidor = $servidor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fechacita = $this->fecha->format('d/m/Y');
        $hora = $this->fecha->format('H:i A');
        $evento = $this->evento;
        $descripcion = $this->descripcion;
        $servidor = $this->servidor;
        return $this->subject("Confirmación de cita: " . $evento)->view('mail.citaconfirm', compact('fechacita', 'hora', 'evento', 'descripcion', 'servidor'));
    }
}
