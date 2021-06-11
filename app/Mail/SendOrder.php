<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOrder extends Mailable
{
    use Queueable, SerializesModels;
    private $orderDetail;
    private $dataOrder;
    private $mail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderDetail, $dataOrder,$mail)
    {
        $this->orderDetail = $orderDetail;
        $this->dataOrder = $dataOrder;
        $this->mail = $mail;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [];
        $data['orderDetail'] = $this->orderDetail;
        $data['dataOrder'] = $this->dataOrder;
        $mail = $this->mail;
        
        return $this->subject('Send Order')->view('emails.send_order',compact('mail'))->with($data);
    }
}