<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ChangeStatusRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $responsable;
    public $alumno;
    public $estado;

    /**
     * Create a new message instance.
     */
    public function __construct($responsable, $alumno, $estado)
    {
        $this->responsable = $responsable;
        $this->alumno = $alumno;
        $this->estado = $estado;
    }

    public function build(){
        return $this->markdown('mails.changeStatusRequest')->with([
           'responsable' => $this->responsable,
           'alumno' => $this->alumno,
           'estado' => $this->estado
        ]);
    }


}
