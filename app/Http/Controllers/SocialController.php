<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite; 
// agregado por thavoo
use Exception;
use Auth;

class SocialController extends Controller
{
    //

    public function redirect(){

    	return Socialite::driver('facebook')->redirect();

    }

    public function callback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['facebook_id'] = $user->getId();

            $userModel = new User;
            $createdUser = $userModel->addNew($create);
            Auth::loginUsingId($createdUser->id);
            
            return redirect()->route('home');
        } catch(Exception $e) {
            return redirect('/redirect');
        }
    	

    	
    }





}




