<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyEmailCustom extends Mailable
{
    use Queueable, SerializesModels;

    // We define these as public so the Blade file can see them
    public function __construct(
        public string $full_name,
        public string $url
    ) {}

    /**
     * Get the message envelope (The Header Info)
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verify Your Email Address',
        );
    }

    /**
     * Get the message content definition (The Body/View)
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.verify', // This points to resources/views/emails/verify.blade.php
        );
    }

    public function attachments(): array
    {
        return [];
    }
}