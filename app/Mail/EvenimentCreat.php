<?php

namespace App\Mail;

use App\Models\Eveniment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EvenimentCreat extends Mailable
{
    use Queueable, SerializesModels;

    public $eveniment;

    /**
     * Create a new message instance.
     */
    public function __construct(Eveniment $eveniment)
    {
        $this->eveniment = $eveniment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invitație participare la eveniment',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.eveniment_creat',
        );
    }
    public function build()
    {
        return $this->view('emails.eveniment_creat');
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
