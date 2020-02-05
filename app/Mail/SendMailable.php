<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
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
        // return $this->from('ronanotaza@gmail.com')
        //         ->view('welcome');

        return $this->from('chedcaragastufaps@ched.gov.ph')
                    ->subject('Confirmation Code')
                    ->view('information')
                    ->text('success')
                    ->with(
                      [
                            'message' => 'Ban co the kiem tra email',
                      ]);

                    
    }
}