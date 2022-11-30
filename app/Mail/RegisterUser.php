<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterUser extends Mailable
{
    use Queueable, SerializesModels;

    protected $admin;
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
        //dd($data);
        $this->admin = $data['admin'];
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
        return $this->view('emails.registerUser')
        ->subject(ucfirst($this->surname).' - Registration successful')
            ->with([
                    'admin' => $this->admin,
                    'username' => $this->username,
                    'email' => $this->email,
                    'usertype' => $this->usertype,
                    'messagetype' => $this->messagetype
                ]);
    }
}
