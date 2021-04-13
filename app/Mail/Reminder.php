<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reminder extends Mailable
{
    use Queueable, SerializesModels;
   public $event;
   public $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event=$event;
        $this->content="Henlo henlo";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('www@my.com', '<From Cool>')
        ->subject("Remember me!")
        ->text('emails.rem_plain')
        ->view('emails.reminder')
        ->with(['content'=>$this->content]);
    }
}
