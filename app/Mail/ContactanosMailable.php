<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactanosMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * trae el asunto del correo.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: ' EcoCycle confirma tu alquiler',
        );
    }

    /**
     * trae el cuerpo del mensaje.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.alquiler', //retorna la vista que contiene el cuerpo del correo
        );
    }

    /**
     * funciones para añadir recursos
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
