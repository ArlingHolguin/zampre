<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PlacedOrderMailable extends Mailable
{
    use Queueable, SerializesModels;
    Public $subject = "Nuevo Pedido - Zampreonline";
    Public $orden;
    Public $ip;
    Public $ts;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orden)
    {
        //
        $this->orden = $orden;
        $infoClient = json_decode($orden->info_ip, true);
        $infoClient = json_decode($orden->info_ip, true);
        $this->ip = $infoClient['ip'];
        $this->ts = $infoClient['ts'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.placed-order');
    }
}
