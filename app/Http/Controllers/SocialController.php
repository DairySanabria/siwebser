<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite; 

class SocialController extends Controller
{
    //

    public function redirect(){

    	return Socialite::driver('facebook')->redirect();

    }

    public function callback(){

    	//return 'prueba';


    	$user = Socialite::driver('facebook')->user();

    	//dd($user);

    	return ($user->getAvatar());
    }





}




