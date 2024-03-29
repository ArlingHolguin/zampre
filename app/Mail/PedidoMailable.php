<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PedidoMailable extends Mailable
{
    use Queueable, SerializesModels;

    Public $subject = "Pedido recibido - Zampre Online";
    Public $orden;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orden)
    {
        //
        $this->orden = $orden;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.pedidoRecibido');
    }
}
