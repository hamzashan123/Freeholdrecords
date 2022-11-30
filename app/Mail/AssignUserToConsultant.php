<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssignUserToConsultant extends Mailable
{
    use Queueable, SerializesModels;


    protected $username;
    protected $surname;
    protected $email;
    protected $usertype;
    protected $messagetype;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->username = $data['username'];
        $this->surname = $data['surname'];
        $this->email = $data['email'];
        $this->usertype = $data['usertype'];
        $this->messagetype = $data['messagetype'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.AssignUserToConsultant')
        ->subject('New Client Assigned')
        ->with([
                'username' => $this->username,
                'surname' => $this->surname,
                'email' => $this->email,
                'usertype' => $this->usertype,
                'messagetype' => $this->messagetype
            ]);
    }
}
