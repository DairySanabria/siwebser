<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'facebook_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function addNew($input)
    {
        // Este proceso es para verificar si el Id cliente del usuario ya existe, si existe no crea el registro, se evita la duplicidad
        $check = static::where('facebook_id', $input['facebook_id'])->first();

        if(is_null($check)){
            return static::create($input);
        }

        return $check;
    }
}
