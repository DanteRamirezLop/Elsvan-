<?php

namespace App\Mail;

use App\Models\Claim;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClaimFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Claim $claim
    ) {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo reclamo registrado - '.$this->claim->name,
            replyTo: [$this->claim->mail],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.claim',
        );
    }
}
