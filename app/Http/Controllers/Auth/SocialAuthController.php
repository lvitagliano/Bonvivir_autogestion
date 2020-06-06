<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialAuthController extends Controller
{
    // Metodo encargado de la redireccion a Facebook
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    // Metodo encargado de obtener la información del User
    public function handleProviderCallback($provider,Request $request)
    {

        if (!$request->has('code') || $request->has('denied')) {
         return redirect('/');}
        // Obtenemos los datos del User
        $social_User = Socialite::driver($provider)->User(); 
        // Comprobamos si el User ya existe
        if ($User = User::where('email', $social_User->email)->first()) { 
            return $this->authAndRedirect($User); // Login y redirección
        } else {  
            // En caso de que no exista creamos un nuevo User con sus datos.
            $User = User::create([
                'name' => $social_User->name,
                'email' => $social_User->email,
                'avatar' => $social_User->avatar,
                'password' => md5(rand(1,10000)),
                'wizzardToken' => 'facebook_token',
            ]);
                
            
            $currentUser = User::find($User->id);
            $token = 'ivotalents_token';
            $currentUser->perfil = 2;
			$currentUser->activo = 0;				
            $currentUser->wizzardToken = $token;
            
            
            $currentUser->assignRole('industria');
			$currentUser->save();
			
            return $this->authAndRedirect($User); // Login y redirección
        }
    }
 
    // Login y redirección
    public function authAndRedirect($User)
    {
             $currentUser = User::find($User->id);
           
          if($currentUser->activo == 1 and $currentUser->perfil == 2){
			    Auth::login($User);
			   return redirect()->to('/home');
		  }
		  else{
			  Auth::logout($User);
			  return redirect()->to('/login');
		  }


       
    }
}
