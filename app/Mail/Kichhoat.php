<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use phpDocumentor\Reflection\Types\String_;

class Kichhoat extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $nd_kichhoat;
    public function __construct($nd_kichhoat)
    {
        $this->nd_kichhoat = $nd_kichhoat;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.kichhoat')->with(['nd_kichhoat'=>$this->nd_kichhoat]);
    }
}
