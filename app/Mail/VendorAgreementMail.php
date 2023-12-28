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

     protected $downloadUrl;
protected $data;

    public function __construct($downloadUrl, $data)
    {

        $this->downloadUrl = $downloadUrl;
        $this->data = $data;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('procurement@tysglobal.net', 'Vendor News'),
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


    public function build()
    {
        $tempPath = tempnam(sys_get_temp_dir(), 'pdf');
        copy($this->downloadUrl, $tempPath);
        return $this->view('emails.vendor_agreement') // Use view for the email content
            ->with($this->data)
            ->subject('Signed Vendor Agreement')
            ->from('procurement@tysglobal.net', 'Vendor News')
            ->attach($tempPath, [
                'as' => 'Vendor-agreement.pdf',
                'mime' => 'application/pdf',
            ]);
    }

}
