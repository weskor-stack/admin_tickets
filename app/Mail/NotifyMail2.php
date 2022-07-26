<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMail2 extends Mailable
{
    use Queueable, SerializesModels;

        /**
     * The dataMail object instance.
     *
     * @var dataMail
     */
    public $dataMail;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dataMail)
    {
        $this->dataMail = $dataMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->dataMail->subject)
                    ->from($this->dataMail->senderEmail)
                    ->view('mails.'.$this->dataMail->format)
                    ->attach($this->dataMail->attach)
                ;
    }
    
       
}
