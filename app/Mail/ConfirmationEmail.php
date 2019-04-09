<?php

namespace StreetFood\Mail;

use StreetFood\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user=$user;
    }

    public function build()
    {
        return $this->view('confirmation');
    }
}
