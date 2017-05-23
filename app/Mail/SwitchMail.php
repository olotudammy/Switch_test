<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;
use App\Profile;

class SwitchMail extends Mailable
{
    use Queueable, SerializesModels;

    //protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->user = $user;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = Auth::user();
        $mess = Profile::find(Auth::id());
        $d = $data->profile->message;
        $f = $data->profile->file;
        return $this->view('email' , compact('data', 'd', 'f'));
                    
    }
}
