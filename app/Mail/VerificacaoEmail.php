<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificacaoEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $codigo;

    public function __construct($codigo)
    {
        $this->codigo = $codigo;
    }

    public function build()
    {
        return $this->subject('Código de Verificação')
                    ->view('mail.welcome-email');
    }
}
