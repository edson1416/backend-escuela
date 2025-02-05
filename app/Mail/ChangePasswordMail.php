<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ChangePasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $correo;
    public $clave;
    /**
     * Create a new message instance.
     */
    public function __construct($correo, $clave)
    {
        $this->correo = $correo;
        $this->clave = $clave;
    }

    public function build(){
        return $this->view('mails.changePassword')->with(['correo', $this->correo, 'clave' => $this->clave]);
    }
}
