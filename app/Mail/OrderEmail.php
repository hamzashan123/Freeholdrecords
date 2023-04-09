<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $orderid;
    protected $amount;
    protected $user;
    protected $msg;
    protected $orderHtml;
    protected $isAdmin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->orderid = $data['orderid'];
        $this->orderHtml = $data['orderHtml'];
        $this->amount = $data['amount'];
        $this->user = $data['user'];
        $this->msg = $data['msg'];
        $this->isAdmin = $data['admin'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orderemail')
        ->subject('Order Recieved!')
            ->with([
                    'orderid' => $this->orderid,
                    'orderHtml' => $this->orderHtml,
                    'amount' => $this->amount,
                    'user' => $this->user,
                    'msg' => $this->msg,
                    'admin' => $this->isAdmin,
                    
                ]);
    }
}
