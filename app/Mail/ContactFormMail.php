<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $body;
    public $mail;
    public $name;
    /**
     * Create a new message instance.
     */
    public function __construct($subject, $body, $mail, $name)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->mail = $mail;
        $this->name = $name;
    }

    public function build()
    {
        return $this->view('emails.contact-form')
            ->subject($this->subject)
            ->with([
                'body' => $this->body,
            ])
            ->replyTo($this->mail, $this->name);
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Form Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-form',
        );
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
