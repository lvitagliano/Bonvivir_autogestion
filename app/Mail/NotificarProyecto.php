<?php

namespace App\Mail;
use App\Models\Users;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Castings\Castings;

class NotificarProyecto extends Mailable
{
    use Queueable, SerializesModels;
    public $casting;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Castings $casting,Users $user)
    {
        $this->casting = $casting;
        $this->user = $user;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.notificar_proyecto')->subject('Nuevo Proyecto');;
    }
}
