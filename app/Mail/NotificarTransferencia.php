<?php

namespace App\Mail;
use App\Models\Users;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificarTransferencia extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $laImagen;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Users $user, $laImagen)
    {
        $this->user = $user;
        $this->laImagen = $laImagen;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    
        return $this->view('mails.notificar_transferencia')->subject('Nueva Transferencia');
    }
}
