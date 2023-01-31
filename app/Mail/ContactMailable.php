<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
 
class ContactMailable extends Mailable
{
    use Queueable, SerializesModels;
 
    public $mailEmail;
    public $mailNom;
    public $mailPrenom;
    public $mailMessage;
 
    public function __construct(
        $mailEmail,
        $mailNom,
        $mailPrenom,
        $mailMessage
    )
    {
        $this->mailEmail = $mailEmail;
        $this->mailNom = $mailNom;
        $this->mailPrenom = $mailPrenom;
        $this->mailMessage = $mailMessage;
    }

    public function content()
    {
        return new Content(
            view: 'emails.contact',
            with: [
                'mailEmail' => $this->mailEmail,
                'mailNom' => $this->mailNom,
                'mailPrenom' => $this->mailPrenom,
                'mailMessage' => $this->mailMessage
            ],
        );
    }

    public function envelope()
    {
        return new Envelope(
            //Mail from should be same as to with same domain as postmark account because this is a trial account
            from: new Address(env('POSTMARK_ACCOUNT'), 'Contact'),
            subject: 'Question',
        );
    }
}