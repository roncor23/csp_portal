<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $objDemo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($objDemo)
    {
        $this->objDemo = $objDemo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@cspcaraga.com')
            ->subject('Password Changed')
            ->view('password');

                    
    }
    
}
