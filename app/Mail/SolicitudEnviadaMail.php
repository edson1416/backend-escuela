<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SolicitudEnviadaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $responsable;
    public $alumno;

    /**
     * Create a new message instance.
     */
    public function __construct($responsable, $alumno)
    {
        $this->responsable = $responsable;
        $this->alumno = $alumno;
    }

    public function build(){
        return $this->view('mails.solicitudEnviada')->with(['responsable' => $this->responsable, 'alumno' => $this->alumno]);
    }
}
