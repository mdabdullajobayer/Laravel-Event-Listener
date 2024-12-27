<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminNewUserNotification extends Mailable
{
    use SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.adminNewUser')
            ->with([
                'name' => $this->user->name,
                'email' => $this->user->email,
            ])
            ->subject('New User Registration');
    }
}
