<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nome_usuario;
    public $codigo_verificacao;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nome_usuario, $codigo_verificacao)
    {
        $this->nome_usuario = $nome_usuario;
        $this->codigo_verificacao = $codigo_verificacao;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.verify-email')
                    ->with([
                        'nome_usuario' => $this->nome_usuario,
                        'codigo_verificacao' => $this->codigo_verificacao,
                    ]);
    }
}