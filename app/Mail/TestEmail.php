<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data ?? ['name' => 'Pengguna']; 
    }


    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->from('effendyraditya11@gmail.com', 'DoneBang') 
                    ->subject('Verify your email address')  
                    ->view('emails.test') 
                    ->with(['data' => $this->data]);
    }
}
