<?php

namespace StreetFood;

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
        'username','name','apellidos','email','sexo','fechanac','password','llave_acti','validado','provider','provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot(){

        parent::boot();

        static::creating(function($user){
            $user->llave_acti=str_random(48);
        });
    }

    public function hasVerified()
    {
        $this->validado= true;
        $this->llave_acti =null;

        $this->save();


    }

}
