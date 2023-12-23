<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class VendorAgreementMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($downloadUrl)
    {

        $this->downloadUrl = $downloadUrl;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('it@tysmail.com', 'Vendor News'),
            subject: 'Signed Vendor Agreement',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.vendor_agreement',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments($downloadUrl): array
    {
        $tempPath = tempnam(sys_get_temp_dir(), 'pdf');
        copy($this->downloadUrl, $tempPath);

        return [
            Attachment::fromStorage($tempPath)
            ->as('Vendor-agreement.pdf')
            ->withMime('application/pdf'),
        ];
    }
}
