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
    protected $delivery_notes;
    protected $order_notes;
    protected $orderHtml;
    protected $isAdmin;
    protected $purchasedProducts;
    protected $productquantities;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->orderid = $data['orderid'];
        $this->orderHtml = $data['orderHtml'];
        $this->delivery_notes = $data['delivery_notes'];
        $this->order_notes = $data['order_notes'];
        $this->amount = $data['amount'];
        $this->user = $data['user'];
        $this->msg = $data['msg'];
        $this->isAdmin = $data['admin'];
        $this->purchasedProducts = $data['purchasedProducts'];
        $this->productquantities = $data['productquantities'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orderemail')
        ->subject('Order Received')
            ->with([
                    'orderid' => $this->orderid,
                    'orderHtml' => $this->orderHtml,
                    'delivery_notes' => $this->delivery_notes,
                    'order_notes' => $this->order_notes,
                    'amount' => $this->amount,
                    'user' => $this->user,
                    'msg' => $this->msg,
                    'admin' => $this->isAdmin,
                    'purchasedProducts' => $this->purchasedProducts,
                    'productquantities' => $this->productquantities
                    
                ]);
    }
}
