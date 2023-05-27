<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UpdateUserEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $isOld;
    protected $email;
    protected $name;
    protected $id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($isOld, $email, $name, $id)
    {
        $this->isOld = $isOld;
        $this->email = $email;
        $this->name  = $name;
        $this->id    = $id;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Update Email',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'mail.update-user-email',
            with: [
                "is_old" => $this->isOld,
                "name"   => $this->name,
                "email"  => $this->email,
                "id"     => $this->id
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
