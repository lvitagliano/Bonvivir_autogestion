<?php

namespace App\Http\Controllers;
use Illuminate\Notifications\Notifiable;
use App\Notifications\FirebaseNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use App\User;

class NotificacionController extends Controller
{
   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function enviarNotificacion()
    {
        $user = new User();
        $user->notify(new FirebaseNotification());
    }
}
